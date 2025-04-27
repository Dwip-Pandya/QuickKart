<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';
    protected $primaryKey = 'review_id';
    protected $fillable = [
        'product_id',
        'user_id',
        'review_title',
        'review_text',
        'product_rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function product()
    {
        return $this->belongsTo(ProductDetails::class, 'product_id', 'product_id');
    }
}
