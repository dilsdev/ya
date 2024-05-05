<?php

namespace App\Livewire\Admin;

use App\Models\Menu as ModelMenu;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class Menu extends Component
{
    use LivewireWithFileUploads;
    public function render()
    {
        $menus = ModelMenu::all();
        return view('admin.menu', ['menus' => $menus]);
    }

    public $nama;
    public $deskripsi;
    public $harga;
    public $image;
    public $jenis;
    public $status;
    public function store()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $this->image->storeAs('public/menu', $this->image->hashName());

        ModelMenu::create([
            'nama'=> $this->nama,
            'deskripsi' => $this->deskripsi ,
            'harga'=>$this->harga ,
            'image'=>$this->image->hashName() ,
            'status'=>$this->status,
            'jenis'=>$this->jenis
        ]);

        return redirect()->route('admin.menu');
    }
    public function destroy($id)
    {
        ModelMenu::destroy($id);
        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('admin.menu');
    }
}
