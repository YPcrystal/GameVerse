<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'platform', 'genre', 'tanggal_rilis', 'developer', 'publisher', 'deskripsi_singkat', 'gambar_cover', 'trailer', 'rating_rata_rata'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function recommendations()
    {
        return $this->hasMany(Recommendation::class);
    }

    public function averageCriticScore()
    {
        return $this->reviews()->avg('rating');
    }
}