<?php

namespace App\Livewire\Web;

use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Profile extends Component
{
    public $user;
    public $nama;
    public $email;
    public $nomor_telepon;
    public $alamat;
    public $message;
    public function render()
    {
        $this->user();

        return view('user.web.profile');
    }
    public function user()
    {
        $this->user = Auth::user();
        $data = Siswa::where('user_id', $this->user->id)->first();
        if ($data && $data->status == 'belum_diterima') {
            $this->message = 'belum_diterima';
        } elseif ($data && $data->status == 'di_terima') {
            $this->message = 'di_terima';
        };
        // dd($this->user);
        $this->nama = $this->user->name;
        $this->email = $this->user->email;
        $this->nomor_telepon = $this->user->nomor_telepon;
        $this->alamat = $this->user->alamat;
    }
}
