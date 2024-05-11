<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Menu as ModelMenu;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class Tambahmenu extends Component
{
    use LivewireWithFileUploads;
    public function render()
    {
        return view('admin.tambahmenu');
    }
    public $nama;
    public $deskripsi;
    public $harga;
    public $image;
    public $jenis= 'makanan';
    public $status = 'ready';
    public function store()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        $this->image->storeAs('public/menu', $this->image->hashName());

        ModelMenu::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'image' => $this->image->hashName(),
            'status' => $this->status,
            'jenis' => $this->jenis
        ]);

        return redirect()->route('admin.menu');
    }
}
