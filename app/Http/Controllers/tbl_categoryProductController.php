<?php

namespace App\Http\Controllers;

use App\Models\tbl_category_product;
use Illuminate\Http\Request;

class tbl_categoryProductController extends Controller
{
    //
    public function index()
    {
        return tbl_category_product::all();
    }

    public function store(Request $request)
    {
        $tbl_category_product = tbl_category_product::create($request->all());
        return response()->json($tbl_category_product, 201);
    }

    public function show($id)
    {
        return tbl_category_product::find($id);
    }

    public function update(Request $request, $id)
    {
        $tbl_category_product = tbl_category_product::findOrFail($id);
        $tbl_category_product->update($request->all());
        return response()->json($tbl_category_product, 200);
    }

    public function destroy($id)
    {
        tbl_category_product::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
