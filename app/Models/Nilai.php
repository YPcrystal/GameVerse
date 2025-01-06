<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    /** @use HasFactory<\Database\Factories\NilaiFactory> */
    use HasFactory;


    /**
     *fillable
     *
     *@var array
     */

    protected $fillable = [
        'astronomi',
        'fisika',
        'matematika',
        'ipa',
        'ips',
    ];
}
