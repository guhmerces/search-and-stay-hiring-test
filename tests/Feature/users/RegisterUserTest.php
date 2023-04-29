<?php

namespace Tests\Feature\users;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase;


    public function register_user_request(array $merge = []): TestResponse
    {
        $faker = Faker::create('en');

        $reqParams = [
            'email' => $faker->email,
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ];

        $reqParams = array_merge($reqParams, $merge);

        return $this->json('POST', '/api/register', $reqParams);
    }

    public function test_if_can_register_a_user()
    {
        $response = $this->register_user_request();

        $response->assertStatus(201);
    }

    public function test_if_email_is_required_when_registering_a_user()
    {
        $response = $this->register_user_request(['email' => '']);

        $response->assertStatus(422);
    }

    public function test_if_password_is_required_when_registering_a_user()
    {
        $response = $this->register_user_request(['password' => '']);

        $response->assertStatus(422);
    }

    public function test_if_email_should_have_a_valid_email_format()
    {
        $response = $this->register_user_request(['email' => 'not in a email format']);

        $response->assertStatus(422);
    }

    public function test_if_password_should_contain_at_least_8_characters()
    {
        $response = $this->register_user_request(['password' => '12345ab']);

        $response->assertStatus(422);
    }
}
