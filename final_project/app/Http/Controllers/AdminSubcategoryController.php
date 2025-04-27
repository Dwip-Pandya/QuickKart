<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminSubcategoryController extends Controller
{
    public function index()
    {
        $subcategories = DB::table('tbl_subcategory')
            ->join('tbl_category', 'tbl_subcategory.category_id', '=', 'tbl_category.category_id')
            ->select('tbl_subcategory.*', 'tbl_category.category_name')
            ->get();

        return view('admin.subcategory.index', compact('subcategories'));
    }

    public function create()
    {
        $categories = DB::table('tbl_category')->get();
        return view('admin.subcategory.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'subcat_name' => 'required|string|max:255',
            'category_id' => 'required|integer'
        ]);

        DB::table('tbl_subcategory')->insert($data);
        return redirect()->route('adminsubcategory.index')->with('success', 'Subcategory added!');
    }

    public function edit($id)
    {
        $subcategory = DB::table('tbl_subcategory')->where('subcat_id', $id)->first();
        $categories = DB::table('tbl_category')->get();

        return view('admin.subcategory.edit', compact('subcategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'subcat_name' => 'required|string|max:255',
            'category_id' => 'required|integer'
        ]);

        DB::table('tbl_subcategory')->where('subcat_id', $id)->update($data);
        return redirect()->route('adminsubcategory.index')->with('success', 'Subcategory updated!');
    }

    public function destroy($id)
    {
        DB::table('tbl_subcategory')->where('subcat_id', $id)->delete();
        return redirect()->route('adminsubcategory.index')->with('success', 'Subcategory deleted!');
    }
}
