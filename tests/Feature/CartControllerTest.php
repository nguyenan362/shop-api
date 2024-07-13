<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Cart;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_add_to_cart()
    {
        $userData = [
            'user_id' => '1',
            'product_id' => '10',
        ];

        $response = $this->postJson(route('carts.add'), $userData);

        $response->assertStatus(200);
        $response->assertStatus(201);

//        $this->assertDatabaseHas('users', ['email' => 'john.doe@example.com']);
    }

    // Add more tests for getCartByUserId and other CartController methods as needed
}
