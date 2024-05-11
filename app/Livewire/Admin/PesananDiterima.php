<?php

namespace App\Livewire\Admin;

use App\Models\Pesanan;
use Livewire\Component;

class PesananDiterima extends Component
{
    public function render()
    {
        $data = Pesanan::where(['status'=>'di proses'])->get();
        return view('admin.pesanan-diterima', ['data'=>$data]);
    }
    public function selesai($id){
        $data = Pesanan::find($id);
        $data->status = 'selesai';
        $data->save();
    }

}
