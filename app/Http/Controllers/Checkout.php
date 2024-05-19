<?php

namespace App\Http\Controllers;

use App\Models\Item_pesanan;
use App\Models\Pesanan;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Checkout extends Controller
{
    public function index($id, $token){
        $user = Auth::user();
        $pesanan = Pesanan::find($id);
        if ($user->id == $pesanan->user_id) {
            $data = Item_pesanan::select('menus.nama', 'item_pesanans.jumlah', 'item_pesanans.subtotal_harga')
            ->join('menus', 'menus.id', '=', 'item_pesanans.menu_id')
            ->where('pesanan_id', $id)
                ->get();
            return view('user.checkout', ['data' => $data, 'token'=>$token]);
        } else {
            return back();
        }
    }

    public function oke(Request $request){
        if($request->transaction_status == 'settlement'){
            $pesanan = Pesanan::find($request->order_id);
            $pesanan->bayar = $request->gross_amount;
            $pesanan->metode_pembayaran = $request->payment_type;
            $pesanan->status = 'di pending';
            $pesanan->status_bayar = 'di bayar';
            $pesanan->save();
        }
        
    }
}
