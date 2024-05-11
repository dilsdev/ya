<?php

namespace App\Livewire\User;

use App\Models\Item_pesanan;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        $user = Auth::user();
        $pesanan = Pesanan::find($this->id);
        if ($user->id == $pesanan->user_id) {
            $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
                ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
                ->where('pesanan_id', $this->id)
                ->get();
            return view('user.mobile.detail', ['data' => $data]);
        } else {
            return back();
        }
    }
}
