<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('tbl_category')->get();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        DB::table('tbl_category')->insert([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('admincategory.index')->with('success', 'Category added!');
    }

    public function edit($id)
    {
        $category = DB::table('tbl_category')->where('category_id', $id)->first();
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        DB::table('tbl_category')->where('category_id', $id)->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('admincategory.index')->with('success', 'Category updated!');
    }

    public function destroy($id)
    {
        DB::table('tbl_category')->where('category_id', $id)->delete();
        return redirect()->route('admincategory.index')->with('success', 'Category deleted!');
    }
}
