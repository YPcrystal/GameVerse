<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    /**
     * fillable
     * @var array
    */
    protected $table = 'siswas';
    protected $fillable = [
        'image',
        'name',
        'email',
        'address',
        'phone',
    ];
}