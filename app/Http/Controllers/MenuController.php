<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function menu(){
        $menus = Menu::all();
        return response()->json($menus);
    }
    public function makanan(){
        $makanans = Menu::where('jenis', 'makanan')->get();
        return response()->json($makanans);
    }
    public function minuman(){
        $minumans = Menu::where('jenis', 'minuman')->get();
        return response()->json($minumans);
    }
}
