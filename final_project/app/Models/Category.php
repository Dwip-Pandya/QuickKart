<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'tbl_category';
    protected $primaryKey = 'category_id';
    protected $fillable = ['category_name'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'category_id');
    }
}
