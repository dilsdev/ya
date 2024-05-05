<?php

namespace App\Livewire\Admin;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $i = 'oke';
        return view('admin.index', ['i'=>$i]);
    }
}
