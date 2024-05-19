<?php

namespace App\Http\Controllers;

use App\Models\Item_pesanan;
use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Pesanan;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function pending($token)
    {
        $user = User::where('remember_token', $token)->first();
        $pendings = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status', 'pesanans.message')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $user->id, 'pesanans.status' => 'di pending'])
            ->get();

        return response()->json($pendings);
    }
    public function proses($token)
    {
        $user = User::where('remember_token', $token)->first();
        $proseses = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status', 'pesanans.message')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $user->id, 'pesanans.status' => 'di proses'])
            ->get();

        return response()->json($proseses);
    }
    public function selesai($token)
    {
        $user = User::where('remember_token', $token)->first();
        $selesais = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status', 'pesanans.message')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $user->id, 'pesanans.status' => 'selesai'])
            ->get();

        return response()->json($selesais);
    }

    public function detail($id, $token)
    {
        $user = User::where('remember_token', $token)->first();
        $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
        ->join('menus', 'menus.menu_id', '=', 'item_pesanans.menu_id')
        ->where('item_pesanans.pesanan_id', $id)
            ->get();
        // $data = ItemPesanan::where('id_pesanan', $id);
        return view('detail', compact('data'));
    }

    public function pesan($token){
        $user = User::where('remember_token', $token)->first();
        if (Siswa::where(['user_id' => $user->id, 'status' => 'di_terima'])) {
            $keranjangs = Keranjang::select('menus.image', 'users.name', 'menus.status', 'menus.harga', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
                ->join('users', 'users.id', '=', 'keranjangs.user_id')
                ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
                ->where('user_id', $user->id)
                ->get();
            $dataArray = [];
            $i = 0;
            $total_harga = 0;
            foreach ($keranjangs as $isi) {
                // dd($this->keranjangs, $isi);
                if ($isi->checkbox == 'true' && $isi->status == 'ready') {
                    // dd('oke');
                    $dataArray[$i] = $isi->id;
                    $i++;
                }
            }
            $pesanan = Pesanan::create([
                'user_id' => 0,
                'tanggal_pesan' => date('Y-m-d'),
                'jumlah_diskon' => 0,
                'bayar' => 0,
                'kembalian' => 0,
                'total_harga' => 0,
                'status' => "di pending",
            ]);
            foreach ($dataArray as $data) {
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
            }
            $pesanan->user_id = $data_keranjang->user_id;
            $pesanan->total_harga = $total_harga;
            $pesanan->save();
            foreach ($keranjangs as $isi) {
                if ($isi->checkbox == 'true') {
                    $isi->delete();
                }
            }
            return response()->json([$pesanan, $item_pesanan]);
        }
        return response()->json('error', 'akun belum terverifikasi');
    }
}
