<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminProductController extends Controller
{
    public function index()
    {
        $products = DB::table('tbl_products')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $categories = DB::table('tbl_category')->get();
        $subcategories = DB::table('tbl_subcategory')->get();
        return view('admin.product.create', compact('categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock_quantity' => 'required',
            'category_id' => 'required',
            'subcat_id' => 'required',
            'porduct_point1' => 'nullable',
            'porduct_point2' => 'nullable',
            'porduct_point3' => 'nullable',
            'porduct_point4' => 'nullable',
            'image1' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image3' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image4' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $key = 'image' . $i;
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);
                $data[$key] = $filename;
            } else {
                $data[$key] = '';
            }
        }

        DB::table('tbl_products')->insert($data);
        return redirect()->route('adminproduct.index')->with('success', 'Product added!');
    }

    public function edit($id)
    {
        $product = DB::table('tbl_products')->where('product_id', $id)->first();
        $categories = DB::table('tbl_category')->get();
        $subcategories = DB::table('tbl_subcategory')->get();
        return view('admin.product.edit', compact('product', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = DB::table('tbl_products')->where('product_id', $id)->first();

        $data = $request->only([
            'product_name',
            'description',
            'price',
            'stock_quantity',
            'category_id',
            'subcat_id',
            'porduct_point1',
            'porduct_point2',
            'porduct_point3',
            'porduct_point4'
        ]);

        for ($i = 1; $i <= 4; $i++) {
            $key = 'image' . $i;
            if ($request->hasFile($key)) {
                $file = $request->file($key);
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads'), $filename);

                if (!empty($product->$key) && File::exists(public_path('uploads/' . $product->$key))) {
                    File::delete(public_path('uploads/' . $product->$key));
                }

                $data[$key] = $filename;
            }
        }

        DB::table('tbl_products')->where('product_id', $id)->update($data);
        return redirect()->route('adminproduct.index')->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = DB::table('tbl_products')->where('product_id', $id)->first();

        for ($i = 1; $i <= 4; $i++) {
            $img = 'image' . $i;
            if (!empty($product->$img) && File::exists(public_path('uploads/' . $product->$img))) {
                File::delete(public_path('uploads/' . $product->$img));
            }
        }

        DB::table('tbl_products')->where('product_id', $id)->delete();
        return redirect()->route('adminproduct.index')->with('success', 'Product deleted!');
    }
}
