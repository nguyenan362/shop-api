<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_get_new_products()
    {

        // Gửi request GET đến route 'new-products'
        $response = $this->getJson('/api/new-products');

        // Kiểm tra mã status của response
        $response->assertStatus(200);

        // Kiểm tra định dạng của dữ liệu trả về
        $response->assertJsonStructure([
            '*' => [
                'id',
                'name',
                'price',
                'created_at',
                'updated_at',
                // Thêm các thuộc tính khác của sản phẩm nếu cần
            ],
        ]);

        // Kiểm tra số lượng sản phẩm trả về
        $response->assertJsonCount(5);
    }
    /** @test */
    public function it_can_get_product_by_id()
    {
        // Tạo một sản phẩm
        $product = Product::factory()->create();

        // Gửi request GET đến route 'products/{id}'
        $response = $this->getJson('/api/products/' . $product->id);

        // Kiểm tra mã status của response
        $response->assertStatus(200);

        // Kiểm tra xem response có chứa dữ liệu như mong đợi hay không
        $response->assertJson([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            // Thêm các thuộc tính khác của sản phẩm nếu cần
        ]);
    }

    /** @test */
    public function it_can_search_products()
    {
        // Tạo một sản phẩm
        $product = Product::factory()->create();

        // Gửi request GET đến route 'products/search'
        $response = $this->getJson('/api/products/search?keyword=' . $product->name);

        // Kiểm tra mã status của response
        $response->assertStatus(200);

        // Kiểm tra xem response có chứa dữ liệu như mong đợi hay không
        $response->assertJson([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'created_at' => $product->created_at,
            'updated_at' => $product->updated_at,
            // Thêm các thuộc tính khác của sản phẩm nếu cần
        ]);
    }
}
