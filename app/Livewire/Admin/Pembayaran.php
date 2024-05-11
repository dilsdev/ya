<?php

namespace App\Livewire\Admin;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Item_pesanan;
use App\Models\Pesanan;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Livewire\Component;

class Pembayaran extends Component
{
    public $id;
    public $total_harga= 0;
    public $bayar = 0;
    public $kembalian = 0;

    protected $rules = [
        'bayar' => 'required|numeric',
    ];

    public function mount(Request $request)
    {
        $this->id = $request->input('id');

    }
    public function totalkan(){
        if($this->bayar>0){
            $this->kembalian = $this->bayar - $this->total_harga ;
        }
    }
    public function store()
    {
        $this->validate($this->rules);
        if($this->bayar >= $this->total_harga){
            $pesanan = Pesanan::find($this->id);
            $pesanan->bayar = $this->bayar;
            $pesanan->kembalian = $this->kembalian;
            $pesanan->status = 'selesai';
            $pesanan->save();
            return redirect()->route('admin.pesananselesai');
        }

        // Lakukan apa pun yang perlu dilakukan setelah validasi berhasil
    }

    public function render()
    {
        $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
            ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
            ->where('pesanan_id', $this->id)
            ->get();
        $pesanan = Pesanan::select('pesanans.total_harga', 'users.name', 'pesanans.tanggal_pesan',)
        ->join('users', 'users.id', '=', 'pesanans.user_id')
        ->where('pesanans.id', $this->id)
            ->get();
        $this->totalkan();
        $this->total_harga = $pesanan[0]->total_harga;
        return view('admin.pembayaran', ['data' => $data, 'pesanan'=>$pesanan]);
    }
}
