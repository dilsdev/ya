<?php

namespace App\Livewire\Admin;

use App\Models\Siswa;
use Livewire\Component;

class Siswas extends Component
{
    public function render()
    {
        $siswas = Siswa::select('id','nama_lengkap','nisn')->where(['status' => 'belum_diterima'])->get();
        return view('admin.siswas', ['siswas'=>$siswas]);
    }
   
}
