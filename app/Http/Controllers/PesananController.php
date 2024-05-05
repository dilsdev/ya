<?php

namespace App\Http\Controllers;

use App\Models\Item_pesanan;
use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function pending($id_user)
    {
        $pendings = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status', 'pesanans.message')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'pending'])
            ->get();

        return response()->json($pendings);
    }
    public function proses($id_user)
    {
        $proseses = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status', 'pesanans.message')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'proses'])
            ->get();

        return response()->json($proseses);
    }
    public function selesai($id_user)
    {
        $selesais = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status', 'pesanans.message')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'selesai'])
            ->get();

        return response()->json($selesais);
    }

    public function detail($id)
    {
        $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
        ->join('menus', 'menus.menu_id', '=', 'item_pesanans.menu_id')
        ->where('item_pesanans.pesanan_id', $id)
            ->get();
        // $data = ItemPesanan::where('id_pesanan', $id);
        return view('detail', compact('data'));
    }

    public function pesan(Request $request){
        // $data =[];
        // $id_keranjang = json_decode($request->query('id_keranjang'));
        $dataArray = [1];
        $i =0;
        $total_harga = 0;
        $pesanan = Pesanan::create([
            'user_id' =>  0,
            'tanggal_pesan' => date('Y-m-d'),
            'jumlah_diskon' => 0,
            'bayar' => 0,
            'kembalian' => 0,
            'total_harga' => 0,
            'status' => "di pending",
        ]);
        foreach($dataArray as $data){
            $data_keranjang = Keranjang::find($data);
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
        return response()->json([$pesanan, $item_pesanan]);
    }
}
