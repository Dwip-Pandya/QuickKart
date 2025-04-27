<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;

class SubcategoryProductsController extends Controller
{
    public function index($category_id, $subcat_id)
    {
        $category = Category::find($category_id);
        $subcategory = Subcategory::find($subcat_id);

        if (!$category || !$subcategory) {
            return abort(404); // Avoid missing parameters error
        }

        $products = Product::where('category_id', $category_id)
            ->where('subcat_id', $subcat_id)
            ->get();

        $subcategories = Subcategory::where('category_id', $category_id)->get();

        $query = Product::where('category_id', $category_id);

        if ($subcat_id) {
            $query->where('subcat_id', $subcat_id);
        }

        // Add search functionality
        if (request()->has('search') && !empty(request('search'))) {
            $searchTerm = request('search');
            $query->where(function ($q) use ($searchTerm) {
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


        return view('products2', compact('category', 'subcategory', 'products', 'subcategories'));
    }
}
