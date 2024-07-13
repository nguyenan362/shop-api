<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Checkout;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckoutControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_change_checkout_status()
    {
        $user = User::factory()->create();
        $checkout = Checkout::factory()->create();

        $response = $this->actingAs($user)->putJson(route('checkouts-change-status', ['checkout_id' => $checkout->id]), [
            'status' => 'completed',
        ]);

        $response->assertStatus(200);
        $this->assertEquals('completed', $checkout->fresh()->status);
    }

    // Add more tests for other CheckoutController methods as needed
}
