<?php

namespace App\Livewire\User;

use App\Models\Item_pesanan;
use App\Models\Keranjang as ModelsKeranjang;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Keranjang extends Component
{
    public int $total = 0;
    // public $checkbox = 'false';
    // public $htmlcheckbox = '';
    public $keranjangs;
    public $token;
    public $metode_pembayaran = '';
    public $dataArray = [];
    public $message;
    public function render()
    {
        $user = Auth::user();
        $data = Siswa::where('user_id', $user->id)->first();
        if ($data->status == 'belum_diterima') {
            $this->message = 'belum_diterima';
        } elseif ($data->status == 'di_terima') {
            $this->message = 'di_terima';
        };
        // $keranjangs = Keranjang::where('user_id', $user->id);
        $this->keranjangs = ModelsKeranjang::select('menus.image', 'users.name', 'menus.status', 'menus.harga', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
            ->join('users', 'users.id', '=', 'keranjangs.user_id')
            ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
            ->where('user_id', $user->id)
            ->get();
        $this->total();
        return view('user.mobile.keranjang');
    }

       public function addkeranjang($id)
    {
        $user = Auth::user();
        // $menu = Menu::find($id);
        if (Menu::find($id))
            ModelsKeranjang::create([
                'user_id' => $user->id,
                'menu_id' => $id,
                'jumlah' => 1,
                'checkbox' => 'false'
            ]);
        return response('oke');
    }
    public function hapuskeranjang($id)
    {
        ModelsKeranjang::destroy($id);
        // $data->delete();

    }
    public function kurangikeranjang($id)
    {
        $data = ModelsKeranjang::find($id);
        if ($data->jumlah > 0) {
            $data->jumlah -= 1;
            $data->save();
        }
    }
    public function tambahkeranjang($id)
    {
        $data = ModelsKeranjang::find($id);
        $data->jumlah += 1;
        $data->save();
    }
    public function check($id)
    {
        $data = ModelsKeranjang::find($id);
        $data->checkbox = 'true';
        $data->save();
        // $this->rendercheckbox();
    }
    public function uncheck($id)
    {
        $data = ModelsKeranjang::find($id);
        $data->checkbox = 'false';
        $data->save();
        // $this->checkbox = 'false';
        //     if($this->rendercheckbox()){
        //         dd('oke');
        //     }
        //     $this->rendercheckbox();
    }

    public function total()
    {
        $oke = 0;
        $i = 0;
        foreach ($this->keranjangs as $isi) {
            // dd($this->keranjangs, $isi);
            if ($isi->checkbox == 'true' && $isi->status == 'ready') {
                // dd('oke');
                $this->dataArray[$i] = $isi->id;
                $oke += $isi->jumlah * $isi->harga;
                $i++;
            }
            $this->total = $oke;
        }
    }
    public function pesan()
    {
        if (Siswa::where(['user_id' => Auth::user()->id, 'status' => 'di_terima'])) {
            if (isset($this->dataArray[0])) {
                $i = 0;
                $total_harga = 0;
                $pesanan = Pesanan::create([
                    'user_id' => 0,
                    'tanggal_pesan' => date('Y-m-d'),
                    'jumlah_diskon' => 0,
                    'bayar' => 0,
                    'kembalian' => 0,
                    'total_harga' => 0,
                    'metode_pembayaran' => "cod",
                    'status' => "di pending",
                    'status_bayar' => "belum bayar",
                ]);
                foreach ($this->dataArray as $data) {
                    $data_keranjang = ModelsKeranjang::find($data);
                    $menu = Menu::find($data_keranjang->menu_id);
                    // dd($menu);
                    $subtotal = $menu->harga * $data_keranjang->jumlah;
                    $item_pesanan = Item_pesanan::create([
                        'pesanan_id' => $pesanan->id,
                        'menu_id' => $data_keranjang->menu_id,
                        'jumlah' => $data_keranjang->jumlah,
                        'subtotal_harga' => $subtotal,
                    ]);
                    $total_harga = +$subtotal;
                    $i++;
                }
                $pesanan->user_id = $data_keranjang->user_id;
                $pesanan->total_harga = $total_harga;
                $pesanan->save();
                foreach ($this->keranjangs as $isi) {
                    if ($isi->checkbox == 'true') {
                        $isi->delete();
                    }
                }
                return view('user.mobile.myorder');
            } else {
                Alert::error('Warning', 'Keranjang kosong');
                return redirect()->route('web.keranjang');
            }
        }
        return redirect()->route('web.keranjang');
    }
    public function pesanmidtrans()
    {
        if (empty($this->dataArray)) {
            Alert::error('Warning', 'Keranjang kosong');
            return redirect()->route('web.keranjang');
        }

        $pesanan = Pesanan::create([
            'user_id' => 0,
            'tanggal_pesan' => date('Y-m-d'),
            'jumlah_diskon' => 0,
            'bayar' => 0,
            'kembalian' => 0,
            'total_harga' => 0,
            'metode_pembayaran' => "bayar online",
            'status' => "di pending",
            'status_bayar' => "belum bayar",
        ]);

        $total_harga = 0;
        $item_details = [];

        foreach ($this->dataArray as $data) {
            $data_keranjang = ModelsKeranjang::find($data);
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

        foreach ($this->keranjangs as $isi) {
            if ($isi->checkbox == 'true') {
                $isi->delete();
            }
        }

        // Set Midtrans configurations
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY');
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
        $this->token = $snapToken;
        $pesanan->save();

        $this->total();
        return redirect("checkout/$pesanan->id/$snapToken");
    }

}
