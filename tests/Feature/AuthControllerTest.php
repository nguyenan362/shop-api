<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_can_login_a_user()
    {
        $userData = [

            'email' => 'test@gmail.com',
            'password' => '12345678',
        ];

        $response = $this->postJson(route('login'), $userData);

        $response->assertStatus(200);
//        $this->assertDatabaseHas('users', ['email' => 'john.doe@example.com']);
    }


    /** @test */
    public function it_can_register_a_user()
    {
        $userData = [
            'email' => '12@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'role' => '1',
            'name' => 'test',
        ];

        $response = $this->postJson(route('register'), $userData);

        $response->assertStatus(200);
//        $this->assertDatabaseHas('users', ['email' => 'john.doe@example.com']);
    }

    // Add more tests for login, logout, and refresh endpoints as needed
}
