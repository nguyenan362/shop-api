<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WishlistControllerTest extends TestCase
{
    use DatabaseTransactions;



    /** @test */
    public function it_can_add_product_to_wishlist()
    {
        // Tạo một sản phẩm

        // Gửi request POST JSON đến endpoint '/api/wishlists/add'
        $response = $this->actingAs($this->user)->postJson('/api/wishlists/add', [
            'user_id' => '2',
            'product_id' => '9',
        ]);

        // Kiểm tra mã status của response
        $response->assertStatus(200);

        // Kiểm tra xem response có chứa dữ liệu như mong đợi hay không
//        $response->assertJson([
//            'success' => true,
//            'message' => 'Product added to wishlist successfully.',
//            'data' => [
//                'user_id' => $this->user->id,
//                'product_id' => $product->id,
//            ],
//        ]);
    }
}
