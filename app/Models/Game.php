<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'platform', 'genre', 'tanggal_rilis', 'developer', 'publisher', 'deskripsi_singkat', 'gambar_cover', 'trailer'
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function recommendations() // Tambahkan method ini
    {
        return $this->hasMany(Recommendation::class);
    }

    public function averageCriticScore()
    {
        return $this->reviews()->avg('rating'); // Menggunakan 'rating'
    }   

    
}