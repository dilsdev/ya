<?php

namespace App\Livewire\User;

use App\Models\Menu;
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
}
