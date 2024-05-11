<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan;
use Livewire\Component;

class PesananDiterima extends Component
{
    public function render()
    {
        $data = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.id', 'pesanans.tanggal_pesan',  'pesanans.status')
        ->join('users', 'users.id', '=', 'pesanans.user_id')
        ->where(['status' => 'di proses'])->get();
        return view('admin.pesanan-diterima', ['data'=>$data]);
    }
    public function selesai($id){
        $data = Pesanan::find($id);
        $data->status = 'selesai';
        $data->save();
    }

}
