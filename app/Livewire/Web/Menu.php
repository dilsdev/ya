<?php

namespace App\Livewire\Web;

use App\Models\Keranjang;
use App\Models\Menu as ModelsMenu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Menu extends Component
{
    public $menus;
    public $menusnot;
    public $type = 'all';

    public function mount($type)
    {
        if ($type !== null) {
            $this->type = $type;
        }
    }
    public function render()
    {
        $this->type();
        return view('user.web.menu');
    }
    public $search = '';
    public $results = [];
    public function updatedSearch()
    {
        if (strlen($this->search) >= 1) {
            $this->results = ModelsMenu::where('nama', 'like', '%' . $this->search . '%')
                                 ->orWhere('deskripsi', 'like', '%' . $this->search . '%')
                                 ->orWhere('status', 'like', '%' . $this->search . '%')
                                 ->orWhere('jenis', 'like', '%' . $this->search . '%')
                                 ->get();
        } else {
            $this->results = [];
        }
    }


    public function type()
    {
        if ($this->type == 'all') {
            $this->menus = ModelsMenu::where(['status' => 'ready'])->orderBy('menus.created_at', 'desc')->get();
            $this->menusnot = ModelsMenu::where(['status' => 'notready'])->orderBy('menus.created_at', 'desc')->get();
        } else {
            $this->menus = ModelsMenu::where(['jenis' => $this->type, 'status' => 'ready'])->orderBy('menus.created_at', 'desc')->get();
            $this->menusnot = ModelsMenu::where(['jenis' => $this->type, 'status' => 'notready'])->orderBy('menus.created_at', 'desc')->get();
        }
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
                return redirect()->route('web.menuall');
            } else {
                Keranjang::create([
                    'user_id' => $user->id,
                    'menu_id' => $id,
                    'jumlah' => 1,
                    'checkbox' => 'true'
                ]);
                return redirect()->route('web.keranjang');
                // return redirect()->route('user.menu')->with('message', 'keranjang sudah ada');;
            }
        }
    }
}
