<?php

namespace App\Models;
use Coderflex\Laravisit\Concerns\CanVisit;
use Coderflex\Laravisit\Concerns\HasVisits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    use HasVisits;
    protected $table = 'news';

    protected $fillable = [
        'judul',
        'gambar',
        'tanggal',
        'deskripsi',
        'sumber'
    ];
    public function comments()
    {
        return $this->hasMany(Komentar::class, 'komentars_id', 'id');
    }
}
