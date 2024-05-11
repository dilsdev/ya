<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class KeranjangController extends Controller
{
    public function keranjang($id){
        $keranjangs = Keranjang::select('keranjangs.id', 'keranjangs.jumlah', 'users.name','nemus.nama')
        ->join('users', 'users.id', '=', 'keranjangs.user_id')
        ->join('menus', 'menus.id', '=', 'keranjang.menu_id')
        ->where('user_id',$id)->get();
        // $keranjangs = Keranjang::all();
        return response()->json($keranjangs);
    }

    public function create(Request $request){
        $rules = [
            'id_user' => 'require',
            'id_menu' => 'require',
            'jumlah' => 'require',
        ];

        $costemMessage = [
            'id_user.require' => 'id_user harus di isi',
            'id_menu.require' => 'id_menu harus di isi',
            'jumlah.require' => 'jumlah harus di isi',
        ];
        // Validated($rules, $costemMessage);
        Keranjang::create([
            "id_user" => $request->id_user,
            "id_menu" => $request->id_menu,
            "jumlah" => $request->jumlah,
        ]);

        return response()->json('message', 'Berhasil di tambah keranjang');
    }

    public function kurangikeranjang($id, $id_user)
    {
        $data = Keranjang::find($id);
        if ($data->jumlah > 0) {
            $data->jumlah -= 1;
            $data->save();
        }
        return response()->json($data->jumlah);
    }
    public function tambahkeranjang($id, $id_user)
    {
        $data = Keranjang::find($id);
        $data->jumlah += 1;
        $data->save();
        return response()->json($data->jumlah);
    }
    public function check($id)
    {
        $data = Keranjang::find($id);
        $data->checkbox = 'true';
        $data->save();
        return response()->json(200);
    }
    public function uncheck($id)
    {
        $data = Keranjang::find($id);
        $data->checkbox = 'false';
        $data->save();
        return response()->json(200);
    }
    public function delete($id, $id_user){
        $data = Keranjang::find($id);
        $data->delete();
        return response()->json('message', 'barang di hapus');
    }
}
