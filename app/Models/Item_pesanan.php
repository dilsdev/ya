<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_pesanan extends Model
{
    use HasFactory;
    protected $fillable = ['pesanan_id', 'menu_id', 'jumlah', 'subtotal_harga'];
}
