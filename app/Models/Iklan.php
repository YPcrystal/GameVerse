<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iklan extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'durasi',
        'harga',
        'status',
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}