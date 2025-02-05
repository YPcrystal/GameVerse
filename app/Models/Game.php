<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    // Tambahkan semua kolom yang bisa diisi
    protected $fillable = ['title', 'genre', 'description', 'platform'];

    // Relasi dengan model Review
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}