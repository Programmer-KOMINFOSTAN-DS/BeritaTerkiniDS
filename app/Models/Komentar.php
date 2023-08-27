<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    // Nama tabel di basis data
    protected $table = 'komentars';
    protected $guarded = ['id'];

    // Kolom yang dapat diisi (fillable) jika Anda akan menggunakan metode mass assignment
    protected $fillable = ['user_id', 'news_id', 'nama', 'komentar', 'created_at'];

    public function users()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
}