<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Komentar extends Model
{
    protected $table = "komentars";
    protected $with = ['users', 'news'];
    public function users()
    {
        return $this->BelongsTo(user::class);
    }
    public function news()
    {
        return $this->belongsTo(news::class);
    }
}
