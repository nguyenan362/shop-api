<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        return Cart::all();
    }

    public function store(Request $request)
    {
        $cart = Cart::create($request->all());
        return response()->json($cart, 201);
    }

    public function show($id)
    {
        return Cart::find($id);
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);
        $cart->update($request->all());
        return response()->json($cart, 200);
    }

    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
    public function getCartByUserId($user_id)
    {
        // Truy vấn cơ sở dữ liệu để lấy giỏ hàng theo user_id
        $carts = Cart::where('user_id', $user_id)->with('tbl_product')->get();

        // Trả về danh sách giỏ hàng dưới dạng JSON
        return response()->json($carts, 200);
    }
    public function addToCart(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:tbl_products,product_id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Tìm hoặc tạo mục giỏ hàng
        $cartItem = Cart::firstOrCreate(
            [
                'user_id' => $validatedData['user_id'],
                'product_id' => $validatedData['product_id'],
            ],
            [
                'quantity' => 1 // default value for new records
            ]
        );

        // Tăng số lượng sản phẩm trong giỏ hàng
        $cartItem->quantity = $validatedData['quantity'];
        $cartItem->save();

        // Trả về phản hồi JSON
        return response()->json($cartItem, 201);
    }

}
