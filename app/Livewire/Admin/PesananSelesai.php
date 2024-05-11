<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan;
use Livewire\Component;

class PesananSelesai extends Component
{
    public function render()
    {
        $data = Pesanan::where(['status' => 'selesai', 'bayar'=>0])->get();
        $selesai = Pesanan::where('status', 'selesai')->where('bayar', '!=', 0)->get();
        return view('admin.pesanan-selesai', ['data' => $data, 'selesai'=>$selesai]);
    }
}
