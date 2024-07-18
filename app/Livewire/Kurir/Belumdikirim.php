<?php

namespace App\Livewire\Kurir;

use Livewire\Component;

class Belumdikirim extends Component
{
    public function render()
    {
    $belumdikirim = \App\Models\Pengiriman::select('penerima.name as penerima_name', 'pengirimans.phone_number', 'pengirimans.alamat', 'pengirim.name as pengirim_name', 'pengirimans.maps', 'pengirimans.status', 'pengirimans.id', 'pengirimans.id_pesanan')
    ->join('users as penerima', 'penerima.id', '=', 'pengirimans.id_user')
    ->join('users as pengirim', 'pengirim.id', '=', 'pengirimans.id_pengirim')
    ->where('pengirimans.status', 'belum dikirim')
    ->orderBy('pengirimans.created_at', 'desc')
    ->get();
        return view('kurir.belumdikirim', ['belumdikirim'=>$belumdikirim]);
    }
}
