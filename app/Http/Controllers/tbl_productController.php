<?php

namespace App\Http\Controllers;

use App\Models\tbl_product;
use Illuminate\Http\Request;

class tbl_productController extends Controller
{
    //
    public function index()
    {
        return tbl_product::all();
    }

    public function store(Request $request)
    {
        $tbl_product = tbl_product::create($request->all());
        return response()->json($tbl_product, 201);
    }

    public function show($id)
    {
        return tbl_product::find($id);
    }

    public function update(Request $request, $id)
    {
        $tbl_product = tbl_product::findOrFail($id);
        $tbl_product->update($request->all());
        return response()->json($tbl_product, 200);
    }

    public function destroy($id)
    {
        tbl_product::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
    public function getNewProducts()
    {
        $newProducts = tbl_product::where('new', 1)->with('tbl_brand','tbl_category_product')->get();
        return response()->json($newProducts);
    }
    public function getProductsByCategoryId($category_id)
    {
        $products = tbl_product::where('cate_id', $category_id)->get();

        return response()->json($products);
    }

    public function getProductsByBrandId($brand_id)
    {
        $products = tbl_product::where('brand_id', $brand_id)->with('tbl_brand')->get();

        return response()->json($products);
    }

}
