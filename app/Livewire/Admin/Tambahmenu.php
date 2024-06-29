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
        $imagePath = $this->image->getRealPath();
        $imageName = $this->image->hashName();
        $img = imagecreatefromstring(file_get_contents($imagePath));
        if ($img === false) {
            session()->flash('message', 'Gagal memproses gambar.');
            return;
        }
        $width = imagesx($img);
        $height = imagesy($img);

        $newWidth = 260;
        $newHeight = 380;

        if ($width > $height) {
            $newHeight = intval($height * $newWidth / $width);
        } else {
            $newWidth = intval($width * $newHeight / $height);
        }
        $newImg = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $savePath = storage_path('app/public/menu' . $imageName);
        imagejpeg($newImg, $savePath, 60);

        imagedestroy($img);
        imagedestroy($newImg);

        ModelMenu::create([
            'nama' => $this->nama,
            'deskripsi' => $this->deskripsi,
            'harga' => $this->harga,
            'image' => $imageName,
            'status' => $this->status,
            'jenis' => $this->jenis
        ]);

        return redirect()->route('admin.menu');
    }
}
