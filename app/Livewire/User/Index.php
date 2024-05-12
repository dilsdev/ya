<?php

namespace App\Livewire\User;

use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Rekomendasi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $makanans = Menu::where('jenis', 'makanan')
        ->latest()
            ->take(5)
            ->get();
        $minumans = Menu::where('jenis', 'minuman')
        ->latest()
            ->take(5)
            ->get();
        $rekomendasi = Rekomendasi::all()->take(1);

        return view('user.index', ['makanans'=>$makanans, 'minumans'=>$minumans, 'rekomendasi'=> $rekomendasi]);
    }
    public function addKeranjang($id)
    {
        $user = Auth::user();
        if (Menu::find($id)) {
            $krjg = keranjang::where([
                'user_id' => $user->id,
                'menu_id' => $id,
            ])->get();
            if($krjg){
                Keranjang::create([
                    'user_id' => $user->id,
                    'menu_id' => $id,
                    'jumlah' => 1,
                    'checkbox' => 'true'
                ]);
            } else {
                return redirect()->route('user.menu')->with('message', 'keranjang sudah ada');;
            }
        }
        return redirect()->route('user.keranjang');
    }
}
