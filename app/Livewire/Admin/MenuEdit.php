<?php

namespace App\Livewire\Admin;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class MenuEdit extends Component
{
    use LivewireWithFileUploads;
    public function render()
    {
        return view('admin.menu-edit');
    }
    public $nama;
    public $menuId;
    public $deskripsi;
    public $harga;
    public $image;
    public $jenis;
    public $status;
    public function mount($id)
    {
        $menu = Menu::find($id);
        $this->menuId   = $menu->id;
        $this->nama = $menu->nama;
        $this->deskripsi = $menu->deskripsi;
        $this->harga = $menu->harga;
        // $this->image = $menu->image;
        $this->status = $menu->status;
        $this->jenis = $menu->jenis;
    }
    public function update()
    {
        // $this->validate();

        $menu = Menu::find($this->menuId);

        if ($this->image) {

            $this->image->storeAs('public/posts', $this->image->hashName());

            $menu->update([
                'nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
                'harga' => $this->harga,
                'image' => $this->image->hashName(),
                'status' => $this->status,
                'jenis' => $this->jenis
            ]);

        } else {

            $menu->update(['nama' => $this->nama,
                'deskripsi' => $this->deskripsi,
                'harga' => $this->harga,
                // 'image' => $this->image->hashName(),
                'status' => $this->status,
                'jenis' => $this->jenis
            ]);
        }

        session()->flash('message', 'Data Berhasil Diupdate.');

        return redirect()->route('admin.menu');
    }

}
