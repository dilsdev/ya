<?php

namespace App\Livewire\User;

use App\Models\Item_pesanan;
use App\Models\Keranjang as ModelsKeranjang;
use App\Models\Menu;
use App\Models\Pesanan;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use RealRashid\SweetAlert\Facades\Alert;

class Keranjang extends Component
{
    public int $total = 0;
    // public $checkbox = 'false';
    // public $htmlcheckbox = '';
    public $keranjangs;
    public function render()
    {
        $user = Auth::user();
        // $keranjangs = Keranjang::where('user_id', $user->id);
        $this->keranjangs = ModelsKeranjang::select('menus.image', 'users.name', 'menus.harga', 'menus.nama', 'keranjangs.id', 'keranjangs.checkbox', 'keranjangs.jumlah')
            ->join('users', 'users.id', '=', 'keranjangs.user_id')
            ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
            ->where('user_id', $user->id)
            ->get();
        $this->total();
        // $this->rendercheckbox();
        return view('user.mobile.keranjang');
    }

    //     public function rendercheck()
    //     {
    //         $user = Auth::user();
    //         $render = ModelsKeranjang::select('keranjangs.checkbox')
    //         ->join('users', 'users.id', '=', 'keranjangs.user_id')
    //         ->join('menus', 'menus.id', '=', 'keranjangs.menu_id')
    //         ->where('user_id', $user->id)
    //             ->get();

    //         foreach ($this->keranjangs as $key => $isi) {
    //             $isi->checkbox = $render[$key]->checkbox;
    //         }
    //     }
    // public function rendercheckbox(){
    //     // if($this->checkbox == 'false'){
    //             $this->htmlcheckbox = <<<'HTML'
    //                 <input wire:click='checkall' class="form-check-input" style="width: 25px; height: 25px;"type="checkbox">
    //             HTML;
    //     // }else{
    //     //         $this->htmlcheckbox = <<<'HTML'
    //     //                         <input wire:click='uncheckall' checked class="form-check-input" style="width: 25px; height: 25px;"type="checkbox">
    //     //             HTML;

    //     // }
    // }
    public function addkeranjang($id)
    {
        $user = Auth::user();
        // $menu = Menu::find($id);
        if (Menu::find($id))
            ModelsKeranjang::create([
                'user_id' => $user->id,
                'menu_id' => $id,
                'jumlah' => 1,
                'checkbox' => 'false'
            ]);
        return response('oke');
    }
    public function hapuskeranjang($id)
    {
        ModelsKeranjang::destroy($id);
        // $data->delete();

    }
    public function kurangikeranjang($id)
    {
        $data = ModelsKeranjang::find($id);
        if ($data->jumlah > 0) {
            $data->jumlah -= 1;
            $data->save();
        }
    }
    public function tambahkeranjang($id)
    {
        $data = ModelsKeranjang::find($id);
        $data->jumlah += 1;
        $data->save();
    }
    public function check($id)
    {
        $data = ModelsKeranjang::find($id);
        $data->checkbox = 'true';
        $data->save();
        // $this->rendercheckbox();
    }
    public function uncheck($id)
    {
        $data = ModelsKeranjang::find($id);
        $data->checkbox = 'false';
        $data->save();
        // $this->checkbox = 'false';
        //     if($this->rendercheckbox()){
        //         dd('oke');
        //     }
        //     $this->rendercheckbox();
    }

    public function total()
    {
        $oke = 0;
        foreach ($this->keranjangs as $isi) {
            if ($isi->checkbox == 'true') {
                $oke += $isi->jumlah * $isi->harga;
            }
            $this->total = $oke;
        }
    }
    public function pesan()
    {
        $dataArray = [];
        $i = 0;
        foreach ($this->keranjangs as $isi) {
            if ($isi->checkbox == 'true') {
                $dataArray[$i] = $isi->id;
                $i++;
            }
        }
        if (isset($dataArray[0])) {
            $i = 0;
            $total_harga = 0;
            $pesanan = Pesanan::create([
                'user_id' =>  0,
                'tanggal_pesan' => date('Y-m-d'),
                'jumlah_diskon' => 0,
                'bayar' => 0,
                'kembalian' => 0,
                'total_harga' => 0,
                'status' => "di pending",
            ]);
            foreach ($dataArray as $data) {
                $data_keranjang = ModelsKeranjang::find($data);
                $menu = Menu::find($data_keranjang->menu_id);
                // dd($menu);
                $subtotal = $menu->harga * $data_keranjang->jumlah;
                $item_pesanan = Item_pesanan::create([
                    'pesanan_id' => $pesanan->id,
                    'menu_id' => $data_keranjang->menu_id,
                    'jumlah' => $data_keranjang->jumlah,
                    'subtotal_harga' => $subtotal,
                ]);
                $total_harga = +$subtotal;
                $i++;
            }
            $pesanan->user_id = $data_keranjang->user_id;
            $pesanan->total_harga = $total_harga;
            $pesanan->save();
            foreach ($this->keranjangs as $isi) {
                if ($isi->checkbox == 'true') {
                    $isi->delete();
                }
            }
            $this->total();
            return view('user.mobile.myorder');
        } else {
            Alert::error('Warning', 'Keranjang kosong');
            return redirect()->route('user.keranjang');
        }
    }

    // public function checkall()
    // {
    //     if( $this->checkbox = 'false'){
    //         $this->checkbox = 'true';
    //         $user = Auth::user();
    //         $data = ModelsKeranjang::where('user_id', $user->id)->get();
    //         foreach ($data as $item) {
    //             $item->checkbox = 'true';
    //             $item->save();
    //         }
    //         if ($this->rendercheckbox()) {
    //             dd('oke');
    //         }
    //         return response('oke');
    //     }else{
    //         $this->checkbox = 'false';
    //         $user = Auth::user();
    //         $data = ModelsKeranjang::where('user_id', $user->id)->get();
    //         foreach ($data as $item) {
    //             $item->checkbox = 'false';
    //             $item->save();
    //         }
    //         if ($this->rendercheckbox()) {
    //             dd('oke');
    //         }
    //         return response('oke');
    //     }


    // }

    // public function uncheckall()
    // {
    //     $this->checkbox = 'false';
    //     $user = Auth::user();
    //     $data = ModelsKeranjang::where('user_id', $user->id)->get();
    //     foreach ($data as $item) {
    //         $item->checkbox = 'false';
    //         $item->save();
    //     }
    //     $this->rendercheckbox();
    // }



}
