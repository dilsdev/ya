<?php

namespace App\Livewire\Admin;

use App\Models\Item_pesanan;
use App\Models\Pengiriman;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $id;
    public $url;
    public $status;

    public function mount($id, $url)
    {
        $this->id = $id;
        $this->url = $url;
    }

    public function render()
    {

        $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
            ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
            ->where('pesanan_id', $this->id)
            ->get();
        $pesanan = \App\Models\Pesanan::find($this->id);
        $pembeli = \App\Models\User::find($pesanan->user_id);
        $this->status = $pesanan->status;
        return view('admin.detail', ['data' => $data, 'pesanan' => $pesanan, 'pembeli' => $pembeli]);
    }
    public function pindah()
    {
        return redirect()->route($this->url);
    }
    public function terima($id)
    {
        $pesanan = \App\Models\Pesanan::find($id);
        $pesanan->status = 'di proses';
        $pesanan->save();

        return redirect()->route('admin.pesanan');
    }
    public function tolak($id)
    {
        $pesanan = \App\Models\Pesanan::find($id);
        $pesanan->status = 'di tolak';
        $pesanan->save();
        return redirect()->route('admin.pesanan');
    }
    public function selesai($id)
    {
        $data = \App\Models\Pesanan::find($id);
        $pengiriman = Pengiriman::where('id_pesanan', $id)->get();
        if ($pengiriman->isNotEmpty()) {
            $pengiriman->status = "belum dikirim";
        } else {
            // 
        }
        $data->status = 'selesai';
        $data->save();
        return redirect()->route('admin.pesananditerima');
    }
}
