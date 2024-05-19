<?php

namespace App\Livewire\Admin;

use App\Models\Siswa;
use Livewire\Component;

class Siswas extends Component
{
    public function render()
    {
        $siswas = Siswa::where(['status' => 'belum_diterima'])->get();
        return view('admin.siswas', ['siswas'=>$siswas]);
    }
    public function terima($id){
        $data = Siswa::find($id);
        $data->status = 'di_terima';
        $data->save();  
    }
}
