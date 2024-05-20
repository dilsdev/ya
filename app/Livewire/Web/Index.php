<?php

namespace App\Livewire\Web;

use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Rekomendasi;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Index extends Component
{
    public function render()
    {
        $makanans = Menu::where(['jenis' => 'makanan', 'status' => 'ready'])
        ->latest()
            ->take(5)
            ->get();
        $minumans = Menu::where(['jenis' => 'minuman', 'status' => 'ready'])
        ->latest()
            ->take(5)
            ->get();

        $rekomendasi = Rekomendasi::all();

        if ($rekomendasi->count() > 0) {
            if ($rekomendasi->count() == 1) {
                $rekomendasi1 = $rekomendasi;
                $rekomendasi2 = $rekomendasi;
            } else {
                $chunks = $rekomendasi->chunk(max(1, floor($rekomendasi->count() / 2)));

                $rekomendasi1 = $chunks[0];
                $rekomendasi2 = $chunks[1] ?? collect(); 
            }
        } else {
            $rekomendasi1 = collect();
            $rekomendasi2 = collect();
        }


        return view('user.index', ['makanans' => $makanans, 'minumans' => $minumans, 'rekomendasi1' => $rekomendasi1, 'rekomendasi2' => $rekomendasi2, 'rekomendasi' =>$rekomendasi]);
    }
    public function addKeranjang($id)
    {
        $user = Auth::user();
        if (Menu::find($id)) {
            $krjg = keranjang::where([
                'user_id' => $user->id,
                'menu_id' => $id,
            ])->first();
            if ($krjg) {
                Alert::error('Warning', 'Barang sudah ada di keranjang');
                return redirect()->route('web.index');
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
