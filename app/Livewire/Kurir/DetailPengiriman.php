<?php

namespace App\Livewire\Kurir;

use App\Models\Item_pesanan;
use Livewire\Component;

class DetailPengiriman extends Component
{
    public $id;
    public function mound($id){
        $this->id = $id;
    }
    public function render()
    {
    $pengiriman = \App\Models\Pengiriman::select('penerima.name as penerima_name', 'pengirimans.phone_number', 'pengirimans.alamat', 'pengirim.name as pengirim_name', 'pengirimans.maps', 'pengirimans.status', 'pengirimans.id', 'pesanans.message', 'pesanans.status', 'pesanans.status_bayar', 'pesanans.bayar', 'pesanans.kembalian')
    ->join('users as penerima', 'penerima.id', '=', 'pengirimans.id_user')
    ->join('users as pengirim', 'pengirim.id', '=', 'pengirimans.id_pengirim')
    ->join('pesanans', 'pesanans.id', '=', 'pengirimans.id_pesanan')
    ->where('pengirimans.id_pesanan', $this->id)
    ->first();
    $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
            ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
            ->where('pesanan_id', $this->id)
            ->get();
        return view('kurir.detail-pengiriman', ['data'=>$data, 'pengiriman'=>$pengiriman]);
    }
}
