<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;
    protected $table = 'pengirimans';
    protected $fillable = ['id_user', 'id_pengirim','id_pesanan', 'phone_number', 'alamat', 'status','maps'];
}
