<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    // Nama tabel di basis data
    protected $table = 'komentars';

    // Kolom yang dapat diisi (fillable) jika Anda akan menggunakan metode mass assignment
    protected $fillable = ['komentar','klasifikasi'];
}
