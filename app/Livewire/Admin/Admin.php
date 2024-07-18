<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Admin extends Component
{
    public $min;
    public function render()
    {
        $this->updatedSearch();
        $this->min = Auth::user();
        return view('admin.admin');
    }
    public $search = '';
    public $admins = [];
    public function updatedSearch()
    {
        $this->admins = User::where(function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('nomor_telepon', 'like', '%' . $this->search . '%');
        })
        ->where('role', 'admin')
        ->get();

    }
    public function hentikanadmin($id){
        $user = User::find($id);
        if ($user) {
            $user->role = "user";
            $user->save();
            }
        return redirect()->route('admin.admins');
    }
}
