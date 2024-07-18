<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    
    public function render()
    {
        $this->updatedSearch();
        return view('admin.users');
    }
    public $search = '';
    public $users = [];
    public function updatedSearch()
    {
        $this->users = User::where(function($query) {
            $query->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('nomor_telepon', 'like', '%' . $this->search . '%');
        })
        ->where('role', 'user')
        ->get();
    }
    public function jadikurir($id){
        $user = User::find($id);
        if ($user) {
            $user->role = "kurir";
            $user->save();
        }
        return redirect()->route('admin.users');
        }
        
        public function jadiadmin($id){
            $user = User::find($id);
            if ($user) {
                $user->role = "admin";
                $user->save();
                }
            return redirect()->route('admin.users');
        }
}
