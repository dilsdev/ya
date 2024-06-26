<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class KeranjangController extends Controller
{
    public function keranjang($token){
        $user = User::where('token',$token)->first();
        if($user){
        $keranjangs = Keranjang::select('keranjangs.id', 'keranjangs.jumlah','keranjangs.checkbox', 'users.name', 'menus.nama', 'menus.image', 'menus.harga')
        ->join('users', 'users.id', '=', 'keranjangs.user_id')
        ->join('menus', 'menus.id', '=', 'keranjangs.menu_id') 
        ->where('user_id', $user->id)
        ->get();

        return response()->json($keranjangs);
        } else {
            return response()->json(['message' => "Token tidak falid / tidak ada"]);
        }
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
    public function kurangikeranjang($id, $token)
    {
        $user = User::where('token', $token)->first();
        if($user){
        $data = Keranjang::where(['id' => $id, 'user_id' => $user->id])->first();
        if($data){
            $data->jumlah -= 1;
            $data->save();
            return response()->json($data->jumlah);
        }else{
            return response()->json(401);
        }
        } else {
            return response()->json(['message' => "Token tidak falid / tidak ada"]);
        }

    }
    public function tambahkeranjang($id, $token)
    {
        $user = User::where('token', $token)->first();
        if($user){
        $data = Keranjang::where(['id' => $id, 'user_id' => $user->id])->first();
        if($data){
            $data->jumlah += 1;
            $data->save();
            return response()->json($data->jumlah);
        }else{
            return response()->json(401);
        }
        } else {
            return response()->json(['message' => "Token tidak falid / tidak ada"]);
        }

    }
        public function check($id, $token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $data = Keranjang::where(['id' => $id, 'user_id' => $user->id])->first();
            if ($data) {
                if (isset($data->checkbox)) {
                    $data->checkbox = 'true';
                    $data->save();
                    return response()->json(['status' => 200, 'message' => 'Checkbox updated successfully']);
                } else {
                    return response()->json(['status' => 401, 'message' => 'Checkbox attribute not found']);
                }
            } else {
                return response()->json(['status' => 401, 'message' => 'Keranjang not found']);
            }
        } else {
            return response()->json(['status' => 401, 'message' => 'Invalid or missing token']);
        }
    }

    public function uncheck($id, $token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
            $data = Keranjang::where(['id' => $id, 'user_id' => $user->id])->first();
            if ($data) {
                $data->checkbox = 'false';
                $data->save();
                return response()->json(['status' => 200, 'message' => 'Checkbox unchecked successfully']);
            } else {
                return response()->json(['status' => 401, 'message' => 'Keranjang not found']);
            }
        } else {
            return response()->json(['status' => 401, 'message' => 'Invalid or missing token']);
        }
    }

    public function addKeranjang($id, $token)
    {
        $user = User::where('token', $token)->first();
        if ($user) {
        if (Menu::find($id)) {
            $krjg = keranjang::where([
                'user_id' => $user->id,
                'menu_id' => $id,
            ])->first();
            if ($krjg) {
                return response()->json(['message' => "Menu di keranjang sudah ada"]);
                } else {
                    Keranjang::create([
                        'user_id' => $user->id,
                        'menu_id' => $id,
                        'jumlah' => 1,
                        'checkbox' => 'true'
                    ]);
                    return response()->json(200);
                }
            }else{
                return response()->json(['message'=>"menu tidak ada"]);
            }
        } else {
            return response()->json(['message' => "Token tidak falid / tidak ada"]);
        }
    }
    public function delete($id, $token){
        $user = User::where('token', $token)->first();
        if($user){
        $data = Keranjang::where(['id' => $id, 'user_id' => $user->id])->first();
        if ($data) {
            $data->delete();
            return response()->json(200);
        } else {
            return response()->json(401);
        }
        } else {
            return response()->json(['message' => "Token tidak falid / tidak ada"]);
        }
    }
}
