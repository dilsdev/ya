<?php

namespace App\Livewire\User;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Unpaid extends Component
{
    public $unpaids = [];
    public function render()
    {
        return view('user.mobile.unpaid');
    }
    public function unpaid()
    {
        $user = Auth::user();
        $id_user = $user->id;
        $this->unpaids = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.token', 'pesanans.id', 'pesanans.status')
        ->join('users', 'users.id', '=', 'pesanans.user_id')
        ->where(['pesanans.user_id' => $id_user, 'pesanans.status' => 'belum bayar'])
        ->get();
    }
}
