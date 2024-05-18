<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas';
    protected $fillable = ['user_id', 'nisn', 'tanggal_lahir', 'kelas', 'jurusan', 'alamat', 'image_kp', 'profile'];
}
