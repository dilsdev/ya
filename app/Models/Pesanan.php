<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'tanggal_pesan', 'total_harga', 'jumlah_diskon', 'status', 'bayar', 'kembalian'];
}
