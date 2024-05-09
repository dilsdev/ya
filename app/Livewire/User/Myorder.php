<?php

namespace App\Livewire\User;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Myorder extends Component
{
    public string $pendings= "";
    public $proseses;
    public $selesais;
    public function render()
    {

        return view('user.mobile.myorder');
    }
    public function pending()
    {
        $user = Auth::user();
        $id_user = $user->id;
        $this->pendings = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status')
        ->join('users', 'users.id', '=', 'pesanans.user_id')
        ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'di pending'])
        ->get();
        // return $this->pendings;

        // return view->json($pendings);
    }
    public function proses()
    {
        $user = Auth::user();
        $id_user = $user->id;
        $this->proseses = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status')
        ->join('users', 'users.id', '=', 'pesanans.user_id')
        ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'di proses'])
        ->get();

        // return view->json($proseses);
    }
    public function selesai()
    {
        $user = Auth::user();
        $id_user = $user->id;
        $this->selesais = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.status')
        ->join('users', 'users.id', '=', 'pesanans.user_id')
        ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'selesai'])
        ->get();

        // return view->json($selesais);
    }
}
