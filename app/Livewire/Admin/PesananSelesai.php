<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan;
use Livewire\Component;

class PesananSelesai extends Component
{
    public function render()
    {
        $data = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.id', 'pesanans.tanggal_pesan', 'pesanans.bayar', 'pesanans.kembalian', 'pesanans.status')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['status' => 'selesai', 'bayar'=>0])->orderBy('pesanans.created_at', 'desc')->get();
        $selesais = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.id', 'pesanans.tanggal_pesan', 'pesanans.bayar', 'pesanans.kembalian', 'pesanans.status')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where('status', 'selesai')->where('bayar', '!=', 0)->orderBy('pesanans.created_at', 'desc')->get();
        return view('admin.pesanan-selesai', ['data' => $data, 'selesais'=>$selesais]);
    }
}
