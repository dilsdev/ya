<?php

namespace App\Livewire\Admin;

use App\Models\Item_pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $id;
    public $url;

    public function mount($id, $url)
    {
        $this->id = $id;
        $this->url = $url;
    }

    public function render()
    {

            $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
                ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
                ->where('pesanan_id', $this->id)
                ->get();
            return view('admin.detail', ['data' => $data]);
    }
    public function pindah(){
        return redirect()->route($this->url);
    }

}
