<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::with('subcategories')->get();
        return view('index', compact('categories'));
    }
}
