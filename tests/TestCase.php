<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function get_auth_http_header(User $user): array
    {
        $token = $user->createToken('Test')->plainTextToken;

        return [
            'Authorization' => 'Bearer ' . $token,
        ];
    }

    public function create_user(): User
    {
        User::factory()->make()->save();

        return User::first();
    }
}
