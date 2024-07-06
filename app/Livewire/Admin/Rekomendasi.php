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

        $this->image->storeAs('public/rekomendasi', $this->image->hashName());

        ModelsRekomendasi::create([
            'nama_promosi' => $this->nama_promosi,
            'image' => $this->image->hashName(),
            'url' => 'http://cafe6.dils.my.id/storage/rekomendasi/' . $this->image->hashName(),
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
