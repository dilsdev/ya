<?php

namespace App\Livewire\User;

use App\Models\Keranjang;
use App\Models\Menu as ModelsMenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $menus;
    public $type= 'all';

    public function mount($type)
    {
        if($type !== null){
            $this->type = $type;
        }
    }
    public function render()
    {
        $this->type();
        return view('user.mobile.menu');
    }

    public function type()
    {
        if($this->type == 'all'){
            $this->menus = ModelsMenu::all();
        } else {
            $this->menus = ModelsMenu::where('jenis', $this->type)->get();
        }
    }
    public function addKeranjang($id)
    {
        $user = Auth::user();
        if (Menu::find($id)) {
            $krjg = keranjang::where([
                'user_id' => $user->id,
                'menu_id' => $id,
            ])->get();
            if ($krjg) {
                Keranjang::create([
                    'user_id' => $user->id,
                    'menu_id' => $id,
                    'jumlah' => 1,
                    'checkbox' => 'true'
                ]);
            }else{
                return redirect()->route('user.menu')->with('message', 'keranjang sudah ada');;
            }
        }
        return redirect()->route('user.keranjang');
    }

}
