<?php

namespace App\Http\Controllers;

use App\Models\tbl_brand;
use Illuminate\Http\Request;

class tbl_brandController extends Controller
{
    //
    public function index()
    {
        return tbl_brand::all();
    }

    public function store(Request $request)
    {
        $tbl_brand = tbl_brand::create($request->all());
        return response()->json($tbl_brand, 201);
    }

    public function show($id)
    {
        return tbl_brand::find($id);
    }

    public function update(Request $request, $id)
    {
        $tbl_brand = tbl_brand::findOrFail($id);
        $tbl_brand->update($request->all());
        return response()->json($tbl_brand, 200);
    }

    public function destroy($id)
    {
        tbl_brand::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}
