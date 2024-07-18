<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Kurirs extends Component
{
    public function render()
    {
        $this->updatedSearch();
        return view('admin.kurirs');
    }
    public $search = '';
    public $kurirs = [];
    public function updatedSearch()
    {
        $this->kurirs = User::where(function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('nomor_telepon', 'like', '%' . $this->search . '%');
        })
        ->where('role', 'kurir')
        ->get();
    }
    public function hentikankurir($id){
        $user = User::find($id);
        if ($user) {
            $user->role = "user";
            $user->save();
            }
        return redirect()->route('admin.kurirs');
    }
}
