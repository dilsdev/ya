<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan as ModelsPesanan;
use Livewire\Component;

class Pesanan extends Component
{
    public function render()
    {
        $pesanans = ModelsPesanan::select('users.name', 'pesanans.total_harga', 'pesanans.id',  'pesanans.status', 'pesanans.status_bayar' , 'pesanans.metode_pembayaran')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where('status','di pending')
            ->orderBy('pesanans.created_at', 'desc')
            ->get();
        return view('admin.pesanan', ['pesanans' => $pesanans]);
    }
     
}
