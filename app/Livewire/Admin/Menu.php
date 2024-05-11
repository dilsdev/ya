<?php

namespace App\Livewire\Admin;

use App\Models\Menu as ModelMenu;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\WithFileUploads as LivewireWithFileUploads;

class Menu extends Component
{
    use LivewireWithFileUploads;
    public function render()
    {
        $menus = ModelMenu::all();
        return view('admin.menu', ['menus' => $menus]);
    }

    
    public function destroy($id)
    {
        ModelMenu::destroy($id);
        session()->flash('message', 'Data Berhasil Dihapus.');
        return redirect()->route('admin.menu');
    }
    public function updatestatus($id){
        $data = ModelMenu::find($id);
        if($data->status == 'ready'){
            $data->status = 'notready';
            $data->save();
        }else{
            $data->status = 'ready';
            $data->save();
        }

    }
}
