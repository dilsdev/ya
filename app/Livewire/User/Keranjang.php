<?php

namespace App\Livewire\User;

use App\Models\Keranjang as ModelsKeranjang;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Keranjang extends Component
{
    public int $total = 0;
    public function render()
    {
        $user = Auth::user();
        // $keranjangs = Keranjang::where('user_id', $user->id);
        $keranjangs = ModelsKeranjang::select('menus.image','users.name', 'menus.nama', 'keranjangs.id', 'keranjangs.jumlah')
        ->join('users', 'users.id', '=' ,'keranjangs.user_id')
        ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
        ->where('user_id', $user->id)
        ->get();
        return view('user.mobile.keranjang', ['keranjangs'=>$keranjangs]);
    }

    public function addkeranjang($id){
        $user = Auth::user();
        // $menu = Menu::find($id);
        if (Menu::find($id))
            ModelsKeranjang::create([
                'user_id' => $user->id,
                'menu_id' => $id,
                'jumlah' => 1
        ]);
        return response('oke');
    }
    public function hapuskeranjang($id){
        $data = ModelsKeranjang::find($id);
        $data->delete();

    }
    public function kurangikeranjang($id){
        $data = ModelsKeranjang::find($id);
        $data->jumlah -= 1;
        $data->save();
    }
    public function tambahkeranjang($id){
        $data = ModelsKeranjang::find($id);
        $data->jumlah += 1;
        $data->save();
    }
}
