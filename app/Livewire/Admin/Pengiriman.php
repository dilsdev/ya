<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Pengiriman extends Component
{
    public function render()
    {
        $belumdikirim = \App\Models\Pengiriman::where("status", "belum dikirim")->orderBy('pengirimans.created_at', 'desc');
        $sudahdikirim = \App\Models\Pengiriman::where("status", "sudah dikirim")->orderBy('pengirimans.created_at', 'desc');
        return view('admin.pengiriman', ['belumdikirim'=>$belumdikirim, 'sudahdikirim'=>$sudahdikirim]);
    }
}
