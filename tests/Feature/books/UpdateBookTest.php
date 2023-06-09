<?php

namespace Tests\Feature\books;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;
use Tests\TestCase;

class UpdateBookTest extends TestCase
{
    use RefreshDatabase;

    public function test_if_can_update_a_book():void
    {
        $faker = Faker::create('en');

        $updateParams = [
            'name' => $faker->name . ' Book',
            'isbn' => rand(1000000000000, 9999999999999),
            'value' => "10.55",
        ];

        Book::factory()->make()->save();
        $book = Book::all()->last();

        $authHeader = $this->get_auth_http_header($this->create_user());

        $response = $this->put('/api/books/' . $book->id, $updateParams, $authHeader);
        $response->assertStatus(200);

        $book = Book::all()->last();
        $this->assertEquals($book->name, $updateParams['name']);
        $this->assertEquals($book->isbn, $updateParams['isbn']);
        $this->assertEquals($book->value, $updateParams['value']);

    }
}
