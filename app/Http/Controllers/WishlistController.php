<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return Wishlist::all();
    }

    public function store(Request $request)
    {
        $wishList = Wishlist::create($request->all());
        return response()->json($wishList, 201);
    }

    public function show($id)
    {
        return Wishlist::find($id);
    }

    public function update(Request $request, $id)
    {
        $wishList = Wishlist::findOrFail($id);
        $wishList->update($request->all());
        return response()->json($wishList, 200);
    }

    public function destroy($id)
    {
        Wishlist::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
    public function getWishlistByUserId($user_id)
    {
        // Truy vấn cơ sở dữ liệu để lấy giỏ hàng theo user_id
        $wishLists = Wishlist::where('user_id', $user_id)->get();

        // Trả về danh sách giỏ hàng dưới dạng JSON
        return response()->json($wishLists, 200);
    }
    public function addToWishlist(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:tbl_products,product_id'
        ]);

        // Tạo hoặc cập nhật mục wishlist
        $wishlistItem = Wishlist::updateOrCreate(
            [
                'user_id' => $validatedData['user_id'],
                'product_id' => $validatedData['product_id']
            ]
        );

        // Trả về phản hồi JSON
        return response()->json($wishlistItem, 201);
    }
}
