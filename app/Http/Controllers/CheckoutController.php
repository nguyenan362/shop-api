<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        return Checkout::all();
    }

    public function store(Request $request)
    {
        $checkout = Checkout::create($request->all());
        return response()->json($checkout, 201);
    }

    public function show($id)
    {
        return Checkout::find($id);
    }

    public function update(Request $request, $id)
    {
        $checkout = Checkout::findOrFail($id);
        $checkout->update($request->all());
        return response()->json($checkout, 200);
    }

    public function destroy($id)
    {
        Checkout::findOrFail($id)->delete();
        return response()->json(null, 204);
    }

    public function changeStatus(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'status' => 'required|string',
        ]);

        // Find the checkout by ID
        $checkout = Checkout::findOrFail($id);

        // Update the status
        $checkout->status = $request->input('status');
        $checkout->save();

        // Return the updated checkout
        return response()->json($checkout, 200);
    }
}
