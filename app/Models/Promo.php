<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    protected $fillable = [
        'menu_id',
        'nama_promo',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_beralhir',
        'diskon_persen'
    ];
}
