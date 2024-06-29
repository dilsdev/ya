<?php

namespace App\Livewire\Admin;

use App\Models\Rekomendasi as ModelsRekomendasi;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads as LivewireWithFileUploads;
use Livewire\Component;

class Rekomendasi extends Component
{
    use LivewireWithFileUploads;

    public $nama_promosi;
    public $image;

    public function render()
    {
        $data = ModelsRekomendasi::all();
        return view('admin.rekomendasi', ['data' => $data]);
    }

    public function store()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
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

        $newWidth = 816;
        $newHeight = 274;

        if ($width > $height) {
            $newHeight = intval($height * $newWidth / $width);
        } else {
            $newWidth = intval($width * $newHeight / $height);
        }

        $newImg = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImg, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

        $savePath = storage_path('app/public/rekomendasi/' . $imageName);
        imagejpeg($newImg, $savePath, 60);

        imagedestroy($img);
        imagedestroy($newImg);

        ModelsRekomendasi::create([
            'nama_promosi' => $this->nama_promosi,
            'image' => $imageName,
            'url' => 'http://cafe6.dils.my.id/storage/rekomendasi/' . $imageName,
        ]);

        return redirect()->route('admin.rekomendasi');
    }

    public function destroy($id)
    {
        $rekomendasi = ModelsRekomendasi::findOrFail($id);

        $imagePath = storage_path('app/public/rekomendasi/' . $rekomendasi->image);

        if (File::exists($imagePath)) {
            File::delete($imagePath);
        } else {
            dd('File tidak ditemukan: ' . $imagePath);
        }

        $rekomendasi->delete();

        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('admin.rekomendasi');
    }
}
