<?php

namespace App\Livewire\Admin;

use App\Models\Rekomendasi as ModelsRekomendasi;
use Livewire\WithFileUploads as LivewireWithFileUploads;
use Livewire\Component;

class Rekomendasi extends Component
{
    use LivewireWithFileUploads;
    public function render()
    {
        $data = ModelsRekomendasi::all();
        // return response()->json($data);
        return view('admin.rekomendasi', ['data'=>$data]);
    }
    public $nama_promosi;
    public $image;
    public function store()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $this->image->storeAs('public/rekomendasi', $this->image->hashName());
        // $this->image->storeAs('public/rekomendasi', $this->image->hashName());

        ModelsRekomendasi::create([
            'nama_promosi' => $this->nama_promosi,
            'image' => $this->image->hashName(),
            'url' => 'http://127.0.0.1:8000/storage/rekomendasi' . $this->image->hashName(),
        ]);

        return redirect()->route('admin.rekomendasi');
    }
    public function destroy($id)
    {
        ModelsRekomendasi::destroy($id);
        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('admin.rekomandasi');
    }
}
