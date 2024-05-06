<?php

namespace App\Livewire\User;

use App\Models\Keranjang;
use App\Models\Menu;
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

        return view('user.index', ['makanans'=>$makanans, 'minumans'=>$minumans]);
    }
    public function addKeranjang($id)
    {
        $user = Auth::user();
        if (Menu::find($id)) {
            Keranjang::create([
                'user_id' => $user->id,
                'menu_id' => $id,
                'jumlah' => 1
            ]);
        }
        // Lakukan apa yang Anda inginkan setelah operasi selesai
        return redirect()->route('user.keranjang'); // Gantilah 'route.name' dengan nama route yang sesuai.
    }
}
