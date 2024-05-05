<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use Illuminate\Http\Request;

class KeranjangController extends Controller
{
    public function keranjang($id){
        $keranjangs = Keranjang::select('keranjangs.id', 'keranjangs.jumlah', 'users.name','nemus.nama')
        ->join('users', 'users.id', '=', 'keranjangs.user_id')
        ->join('nemus', 'menus.id', '=', 'keranjang.menu_id')
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

        Keranjang::create([
            "id_user" => $request->id_user,
            "id_menu" => $request->id_menu,
            "jumlah" => $request->jumlah,
        ]);

        return response()->json('message', 'Berhasil di tambah keranjang');
    }

    public function delete($id){
        $data = Keranjang::find($id);
        $data->delete();
        return response()->json('message', 'barang di hapus');
    }
}
