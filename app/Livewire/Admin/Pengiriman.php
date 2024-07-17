<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Pengiriman extends Component
{
    public function render()
    {
    $belumdikirim = \App\Models\Pengiriman::select('penerima.name as penerima_name', 'pengirimans.phone_number', 'pengirimans.alamat', 'pengirim.name as pengirim_name', 'pengirimans.maps', 'pengirimans.status', 'pengirimans.id', 'pengirimans.id_pesanan')
    ->join('users as penerima', 'penerima.id', '=', 'pengirimans.id_user')
    ->join('users as pengirim', 'pengirim.id', '=', 'pengirimans.id_pengirim')
    ->where('pengirimans.status', 'belum dikirim')
    ->orderBy('pengirimans.created_at', 'desc')
    ->get();
    $sudahdikirim = \App\Models\Pengiriman::select('penerima.name as penerima_name', 'pengirimans.phone_number', 'pengirimans.alamat', 'pengirim.name as pengirim_name', 'pengirimans.maps', 'pengirimans.status', 'pengirimans.id')
    ->join('users as penerima', 'penerima.id', '=', 'pengirimans.id_user')
    ->join('users as pengirim', 'pengirim.id', '=', 'pengirimans.id_pengirim')
    ->where('pengirimans.status', 'sudah dikirim')
    ->orderBy('pengirimans.created_at', 'desc')
    ->get();
        return view('admin.pengiriman', ['belumdikirim'=>$belumdikirim, 'sudahdikirim'=>$sudahdikirim]);
    }
}
