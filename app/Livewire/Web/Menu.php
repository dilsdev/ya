<?php

namespace App\Livewire\Web;

use App\Models\Keranjang;
use App\Models\Menu as ModelsMenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Menu extends Component
{
    public $menus;

    public function render()
    {
        if ($this->menus === null) {
            $this->menus = ModelsMenu::all();
        }
        return view('user.web.menu');
    }
    public function addKeranjang($id)
    {
        $user = Auth::user();
        if (ModelsMenu::find($id)) {
            Keranjang::create([
                'user_id' => $user->id,
                'menu_id' => $id,
                'jumlah' => 1,
                'checkbox'=> 'true'
            ]);
        }
        // Lakukan apa yang Anda inginkan setelah operasi selesai
        return redirect()->route('web.keranjang'); // Gantilah 'route.name' dengan nama route yang sesuai.
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
