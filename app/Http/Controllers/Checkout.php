<?php

namespace App\Http\Controllers;

use App\Models\Item_pesanan;
use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Pengiriman;
use App\Models\Pesanan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkout extends Controller
{
    public function index($id, $token)
    {
        $user = Auth::user();
        $pesanan = Pesanan::find($id);
        if ($user->id == $pesanan->user_id) {
            $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
                ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
                ->where('pesanan_id', $id)
                ->get();
            return view('user.checkout', ['data' => $data, 'token' => $token]);
        } else {
            return back();
        }
    }

    public function detailpelanggan(Request $request){
        $pesan = $request->pesan ?? "";
        $user = Auth::user();
        $data = Keranjang::select('menus.image', 'users.name','keranjangs.menu_id', 'menus.harga', 'menus.deskripsi', 'menus.status', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
            ->join('users', 'users.id', '=', 'keranjangs.user_id')
            ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
            ->where(['user_id'=>$user->id, 'checkbox'=>'true'])
            ->get();
        if($data->isNotEmpty()){
            return view('user.detail-pelanggan', ['data' => $data, 'id' => $user->id, 'pesan' => $pesan]);
        }else{
            return redirect()->back();
        }
        }
        public function checkoutpelanggan(Request $request)
        {
            $request->validate([
                'pesan' => 'required|string',
                'phone_number' => 'required|string',
                'alamat' => 'required|string',
                'latitude' => 'required|string',
                'longitude' => 'required|string',
            ]);
            // dd(
            //     $request->pesan,
            //     $request->phone_number,
            //     $request->alamat,
            //     $request->latitude,
            //     $request->longitude,
            // );
    
            $user = Auth::user();
            $keranjangs = Keranjang::select('menus.image', 'users.name','keranjangs.menu_id', 'menus.harga', 'menus.deskripsi', 'menus.status', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
            ->join('users', 'users.id', '=', 'keranjangs.user_id')
            ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
            ->where(['user_id'=>$user->id, 'checkbox'=>'true'])
            ->get();
    
            $pesanan = Pesanan::create([
                'user_id' => $user->id,
                'tanggal_pesan' => date('Y-m-d'),
                'jumlah_diskon' => 0,
                'bayar' => 0,
                'kembalian' => 0,
                'total_harga' => 0,
                'metode_pembayaran' => "bayar online",
                'status' => "belum bayar",
                'status_bayar' => "belum bayar",
                'message' => $request->pesan
            ]);
    
            $total_harga = 0;
            $item_details = [];
            foreach ($keranjangs as $data) {
                $data_keranjang = Keranjang::find($data->id);
                $menu = Menu::find($data_keranjang->menu_id);
                $subtotal = $menu->harga * $data_keranjang->jumlah;
    
                $item_details[] = [
                    'id' => $pesanan->id,
                    'price' => $menu->harga,
                    'quantity' => $data_keranjang->jumlah,
                    'name' => $menu->nama
                ];
    
                Item_pesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'menu_id' => $data_keranjang->menu_id,
                    'jumlah' => $data_keranjang->jumlah,
                    'subtotal_harga' => $subtotal,
                ]);
    
                $total_harga += $subtotal;
            }
    
            $pesanan->user_id = Auth::user()->id;
            $pesanan->total_harga = $total_harga;
            $pesanan->save();
            
            
            \Midtrans\Config::$serverKey = 'SB-Mid-server-dYkQ5fMBfhMDOcZWv44JlgKT';
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;
            
            $params = [
                'transaction_details' => [
                    'order_id' => $pesanan->id,
                    'gross_amount' => $pesanan->total_harga,
                ],
                'item_details' => $item_details,
            ];
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $pesanan->update(['token' => $snapToken]);
            
            foreach ($keranjangs as $isi) {
                if ($isi->checkbox == 'true') {
                    $isi->delete();
                }
            }
    
            Pengiriman::create([
                'id_user' => $pesanan->user_id,
                'id_pesanan' => $pesanan->id,
                'token' => $snapToken,
                'phone_number' => $request->phone_number,
                'alamat' => $request->alamat,
                'status' => "belum dibayar",
                'maps' => "https://www.google.com/maps?q={$request->latitude},{$request->longitude}",
            ]);
            return redirect("checkout/{$pesanan->id}/{$snapToken}");
        }

    public function oke(Request $request)
    {
        $transactionStatus = $request->input('transaction_status');

        switch ($transactionStatus) {
            case 'settlement':
                //pembayaran berhasil
                $pesanan = Pesanan::find($request->order_id);
                $pesanan->bayar = $request->gross_amount;
                $pesanan->metode_pembayaran = $request->payment_type;
                $pengiriman = Pengiriman::where('id_pesanan', $request->order_id)->get();
                if ($pengiriman->isNotEmpty()) {
                    $pengiriman->status = "sudah dibayar";
                } else {
                    // 
                }
                $pesanan->status = 'di pending';
                $pesanan->status_bayar = 'di bayar';
                $pesanan->save();
                break;
            case 'deny':
                //pembayaran ditolak
                $pesanan = Pesanan::find($request->order_id);
                $pesanan->bayar = $request->gross_amount;
                $pesanan->metode_pembayaran = $request->payment_type;
                $pesanan->status = 'di tolak';
                $pesanan->status_bayar = 'di tolak';
                $pesanan->save();
                break;
            case 'cancel':
                //pembayaran dibatalkan
                $pesanan = Pesanan::find($request->order_id);
                $pesanan->bayar = $request->gross_amount;
                $pesanan->metode_pembayaran = $request->payment_type;
                $pesanan->status = 'di cancel';
                $pesanan->status_bayar = 'di cancel';
                $pesanan->save();
                break;
            case 'expire':
                //pembayaran kadaluwarsa
                $pesanan = Pesanan::find($request->order_id);
                $pesanan->bayar = $request->gross_amount;
                $pesanan->metode_pembayaran = $request->payment_type;
                $pesanan->status = 'kadaluwarsa';
                $pesanan->status_bayar = 'kadaluwarsa';
                $pesanan->save();
                break;
            case 'failure':
                //pembayaran gagal
                $pesanan = Pesanan::find($request->order_id);
                $pesanan->bayar = $request->gross_amount;
                $pesanan->metode_pembayaran = $request->payment_type;
                $pesanan->status = 'gagal';
                $pesanan->status_bayar = 'gagal';
                $pesanan->save();
                break;
        }

        return response()->json(200);
    }
    public function pesanmitrans(Request $request){
        $user = Auth::user();
        $keranjangs = Keranjang::select('menus.image', 'users.name','keranjangs.menu_id', 'menus.harga', 'menus.deskripsi', 'menus.status', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
            ->join('users', 'users.id', '=', 'keranjangs.user_id')
            ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
            ->where(['user_id'=>$user->id, 'checkbox'=>'true'])
            ->get();
            // dd($keranjangs);
            // dd($request->pesan);
        $pesanan = Pesanan::create([
            'user_id' => $user->id,
            'tanggal_pesan' => date('Y-m-d'),
            'jumlah_diskon' => 0,
            'bayar' => 0,
            'kembalian' => 0,
            'total_harga' => 0,
            'metode_pembayaran' => "bayar online",
            'status' => "belum bayar",
            'status_bayar' => "belum bayar",
            'message'=>$request->pesan
        ]);

        $total_harga = 0;
        $item_details = [];

        foreach ($keranjangs as $data) {
            // dd($data->menu_id);
            $data_keranjang = Keranjang::find($data->id);
            // dd($data_keranjang); 
            $menu = Menu::find($data_keranjang->menu_id);
            $subtotal = $menu->harga * $data_keranjang->jumlah;

            $item_details[] = [
                'id' => $pesanan->id,
                'price' => $menu->harga,
                'quantity' => $data_keranjang->jumlah,
                'name' => $menu->nama
            ];

            Item_pesanan::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $data_keranjang->menu_id,
                'jumlah' => $data_keranjang->jumlah,
                'subtotal_harga' => $subtotal,
            ]);

            $total_harga += $subtotal;
        }

        $pesanan->user_id = Auth::user()->id;
        $pesanan->total_harga = $total_harga;
        $pesanan->save();

        
        // Set Midtrans configurations
        \Midtrans\Config::$serverKey = 'SB-Mid-server-dYkQ5fMBfhMDOcZWv44JlgKT';
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $pesanan->id,
                'gross_amount' => $total_harga,
            ],
            'item_details' => $item_details,
        ];

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $pesanan->token = $snapToken;
        $token = $snapToken;
        $pesanan->save();
        foreach ($keranjangs as $isi) {
            if ($isi->checkbox == 'true') {
                    $isi->delete();
                }
            }
        // foreach ($this->keranjangs as $isi) {
            //     if ($isi->checkbox == 'true') {
                //         $isi->delete();
                //     }
                // }
                
                return redirect("checkout/$pesanan->id/$snapToken");
                // dd('oke');
    }
    public function pesan(Request $request)
    {
        $user = Auth::user();
        $keranjangs = Keranjang::select('menus.image', 'users.name','keranjangs.menu_id', 'menus.harga', 'menus.deskripsi', 'menus.status', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
            ->join('users', 'users.id', '=', 'keranjangs.user_id')
            ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
            ->where(['user_id'=>$user->id, 'checkbox'=>'true'])
            ->get();
            // dd($keranjangs);
            // dd($request->pesan);
        $pesanan = Pesanan::create([
            'user_id' =>  0,
                'tanggal_pesan' => date('Y-m-d'),
                'jumlah_diskon' => 0,
                'bayar' => 0,
                'kembalian' => 0,
                'total_harga' => 0,
                'metode_pembayaran' => "cod",
                'status' => "di pending",
                'status_bayar' => "belum bayar",
            'message'=>$request->pesan
        ]);

        $total_harga = 0;
        $item_details = [];

        foreach ($keranjangs as $data) {
            // dd($data->menu_id);
            $data_keranjang = Keranjang::find($data->id);
            // dd($data_keranjang); 
            $menu = Menu::find($data_keranjang->menu_id);
            $subtotal = $menu->harga * $data_keranjang->jumlah;

            $item_details[] = [
                'id' => $pesanan->id,
                'price' => $menu->harga,
                'quantity' => $data_keranjang->jumlah,
                'name' => $menu->nama
            ];

            Item_pesanan::create([
                'pesanan_id' => $pesanan->id,
                'menu_id' => $data_keranjang->menu_id,
                'jumlah' => $data_keranjang->jumlah,
                'subtotal_harga' => $subtotal,
            ]);

            $total_harga += $subtotal;
        }

        $pesanan->user_id = Auth::user()->id;
        $pesanan->total_harga = $total_harga;
        $pesanan->save();
        foreach ($keranjangs as $isi) {
            if ($isi->checkbox == 'true') {
                    $isi->delete();
                }
            }
            return redirect()->route('user.keranjang');
    }
}
