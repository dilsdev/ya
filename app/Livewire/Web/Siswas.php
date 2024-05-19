<?php

namespace App\Livewire\Web;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class Siswas extends Component
{
    use WithFileUploads;

    public $nisn;
    public $tanggal_lahir;
    public $jurusan;
    public $alamat;
    public $kelas;
    public $image_kp;
    public $nama_lengkap;

    protected $rules = [
        'nisn' => 'required|numeric|digits:10|unique:siswas,nisn',
        'tanggal_lahir' => 'required|date',
        'jurusan' => 'required|string|max:100',
        'nama_lengkap' => 'required|string|max:100',
        'alamat' => 'required|string|max:255',
        'kelas' => 'required|string|max:10',
        'image_kp' => 'required|image|max:3024',
    ];

    public function render()
    {
        return view('user.web.siswas');
    }

    public function kirim()
    {
        $this->validate();
        $this->image_kp->storeAs('public/kartu_peserta', $this->image_kp->hashName());
        $user = Auth::user();
        Siswa::create([
            'user_id' => $user->id,
            'nama_lengkap' => $this->nama_lengkap,
            'status' => 'belum_diterima',
            'nisn' => $this->nisn,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jurusan' => $this->jurusan,
            'alamat' => $this->alamat,
            'kelas' => $this->kelas,
            'image_kp' => $this->image_kp->hashName(),
        ]);
        return redirect()->route('web.profile');
    }
}
