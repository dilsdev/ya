<?php

namespace App\Livewire\Admin;

use App\Models\Siswa;
use Livewire\Component;

class DetailSiswa extends Component
{
    public $id;
    public function mound($id){
        $this->id = $id;
    }
    public function render()
    {
        $siswas = Siswa::where(['status' => 'belum_diterima', 'id'=>$this->id])->get();
        return view('admin.detail-siswa', ['siswas'=>$siswas]);
    }
    public function terima($id){
        $data = Siswa::find($id);
        $data->status = 'di_terima';
        $data->save();  
    }
}
