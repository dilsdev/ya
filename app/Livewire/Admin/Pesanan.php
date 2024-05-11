<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan as ModelsPesanan;
use Livewire\Component;

class Pesanan extends Component
{
    public function render()
    {
        $pesanans = ModelsPesanan::where('status','di pending')->get();
        return view('admin.pesanan', ['pesanans' => $pesanans]);
    }
     public function terima($id){
        $pesanan = \App\Models\Pesanan::find($id);
        $pesanan->status = 'di proses';
        $pesanan->save();
        return redirect()->route('admin.pesananditerima');
         }
     public function tolak($id){
        $pesanan = \App\Models\Pesanan::find($id);
        $pesanan->status = 'di tolak';
        $pesanan->save();
        return redirect()->route('admin.pesanan');
         }
}
