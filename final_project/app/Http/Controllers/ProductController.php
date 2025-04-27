<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($category_id, $subcat_id = null)
    {
        // Fetch category
        $category = Category::where('category_id', $category_id)->first();

        if (!$category) {
            return abort(404, 'Category not found');
        }

        // Fetch subcategories of this category
        $subcategories = Subcategory::where('category_id', $category_id)->get();

        // Fetch products based on category and subcategory (if provided)
        $query = Product::where('category_id', $category_id);

        if ($subcat_id) {
            $query->where('subcat_id', $subcat_id);
        }
        
        // Add search functionality
        if (request()->has('search') && !empty(request('search'))) {
            $searchTerm = request('search');
            $query->where(function($q) use ($searchTerm) {
                $q->where('product_name', 'LIKE', '%' . $searchTerm . '%')
                  ->orWhere('description', 'LIKE', '%' . $searchTerm . '%');
            });
        }
        
        // Apply sorting if requested
        if (request()->has('sort')) {
            if (request('sort') == 'price_low_high') {
                $query->orderBy('price', 'asc');
            } elseif (request('sort') == 'price_high_low') {
                $query->orderBy('price', 'desc');
            }
        }

        $products = $query->get();

        // Return view with variables
        return view('products', compact('category', 'subcategories', 'products'));
    }
}