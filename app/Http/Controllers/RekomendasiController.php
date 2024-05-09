<?php

namespace App\Http\Controllers;

use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    public function rekomendasi(){
        $data = Rekomendasi::all();
        return response()->json($data);
    }
}
