<?php

namespace App\Livewire\User;

use App\Models\Menu as ModelsMenu;
use Livewire\Component;

class Menu extends Component
{
    public $menus;

    public function render()
    {
        if ($this->menus === null) {
            $this->menus = ModelsMenu::all();
        }
        return view('user.mobile.menu');
    }

    public function makanan()
    {
        $this->menus = ModelsMenu::where('jenis', 'makanan')->get();
    }

    public function minuman()
    {
        $this->menus = ModelsMenu::where('jenis', 'minuman')->get();
    }
}
