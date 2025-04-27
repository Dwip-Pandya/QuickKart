<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    use HasFactory;

    protected $table = 'tbl_products'; // Set the correct table name

    protected $primaryKey = 'product_id';

    public $timestamps = false; // Set true if timestamps exist

    protected $fillable = [
        'product_name',
        'image1',
        'image2',
        'image3',
        'image4',
        'price',
        'description',
        'porduct_point1',
        'porduct_point2',
        'porduct_point3',
        'porduct_point4'
    ];
    public function reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'product_id');
    }
    
}
