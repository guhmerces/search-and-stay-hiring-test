<?php

namespace Tests\Feature\users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_user_can_get_access_token(): void
    {
        $user = $this->create_user(); // App\Models\User

        $response = $this->post('api/login', [
            'email' => $user->email,
            'password' => '12345678',
        ]);

        $response->assertStatus(200);

        $resData = $response->decodeResponseJson()->json();

        $this->assertArrayHasKey('data', $resData);
        $this->assertArrayHasKey('token', $resData['data']);
    }

    public function test_if_user_can_logout(): void
    {
        $authHeader = $this->get_auth_http_header($this->create_user());

        $response = $this->post('/api/logout', [], $authHeader);

        $response->assertStatus(200);
    }
}
