<?php

namespace App\Livewire\Kurir;

use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Perludikirim extends Component
{
    public function render()
    {
        $idpengirim = Auth::user()->id;
        $perludikirim = \App\Models\Pengiriman::select('penerima.name as penerima_name', 'pengirimans.phone_number', 'pengirimans.alamat', 'pengirim.name as pengirim_name', 'pengirimans.maps', 'pengirimans.status', 'pengirimans.id', 'pengirimans.id_pesanan')
        ->join('users as penerima', 'penerima.id', '=', 'pengirimans.id_user')
        ->join('users as pengirim', 'pengirim.id', '=', 'pengirimans.id_pengirim')
        ->where('pengirimans.status', 'perlu dikirim')
        ->where('pengirimans.id_pengirim', $idpengirim)
        ->orderBy('pengirimans.created_at', 'desc')
        ->get();
        return view('kurir.perludikirim', ['perludikirim'=>$perludikirim]);
    }
    public function selesai($id){
        $data = Pengiriman::find($id);
        $data->status = "sudah dikirim";
        $data->save();
        return redirect()->route('kurir.perludikirim');
    }
}
