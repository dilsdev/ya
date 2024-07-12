<?php

namespace App\Livewire\Web;

use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Unpaid extends Component
{
    public function render()
    {
        $user = Auth::user();
        $id_user = $user->id;
        $unpaids = Pesanan::select('users.name', 'pesanans.total_harga', 'pesanans.token', 'pesanans.id', 'pesanans.status')
            ->join('users', 'users.id', '=', 'pesanans.user_id')
            ->where(['pesanans.user_id' => $id_user, 'pesanans.status_bayar' => 'belum bayar', 'pesanans.metode_pembayaran' => 'bayar online', 'pesanans.status' => 'belum bayar', 'pesanans.bayar' => 0])
            ->orderBy('pesanans.created_at', 'desc')
            ->get();
        return view('user.web.unpaid', ['unpaids' => $unpaids]);
    }
}
