<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Hasfactory;

class Review extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */
    protected $fillable = [
        'product_id',
        'content',
        'user_id'
    ];
    //relasi ke product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}