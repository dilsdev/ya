<?php

namespace App\Livewire\User;

use App\Models\Keranjang;
use App\Models\Menu as ModelsMenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Menuall extends Component
{
    public $menus;
    public $menusnot;
    public function render()
    {
        if ($this->menus === null && $this->menusnot === null) {
            $this->menus = ModelsMenu::where(['status' => 'ready'])->get();
            $this->menusnot = ModelsMenu::where(['status' => 'notready'])->get();
        }
        return view('user.mobile.menu');
    }
    public function addKeranjang($id)
    {
        $user = Auth::user();
        if (ModelsMenu::find($id)) {
            $krjg = keranjang::where([
                'user_id' => $user->id,
                'menu_id' => $id,
            ])->first();
            if ($krjg) {
                Alert::error('Warning', 'Barang sudah ada di keranjang');
                return redirect()->route('user.menuall');
            } else {
                Keranjang::create([
                    'user_id' => $user->id,
                    'menu_id' => $id,
                    'jumlah' => 1,
                    'checkbox' => 'true'
                ]);
                return redirect()->route('user.keranjang');
                // return redirect()->route('user.menu')->with('message', 'keranjang sudah ada');;
            }
        }
    }
}
