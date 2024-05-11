<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan as ModelsPesanan;
use Livewire\Component;

class Pesanan extends Component
{
    public function render()
    {
        $pesanans = ModelsPesanan::select('users.name', 'pesanans.total_harga', 'pesanans.id', 'pesanans.tanggal_pesan',  'pesanans.status')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where('status','di pending')->get();
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
