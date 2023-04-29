<?php

namespace Tests\Feature\books;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class CreateBookTest extends TestCase
{
    use RefreshDatabase;

    public function create_book_request(array $merge = []): TestResponse
    {
        $faker = Faker::create('en');

        $reqParams = [
            'name' => $faker->name . ' Book',
            'isbn' => rand(1000000000000, 9999999999999),
            'value' => rand(1, 999999),
        ];

        $reqParams = array_merge($reqParams, $merge);

        return $this->json('POST', '/api/books', $reqParams);
    }

        /**
     * Test if can create a book.
     */
    public function test_if_can_create_a_book(): void
    {
        $response = $this->create_book_request();

        $response->assertStatus(201);
    }

    /**
     * Test if name is required when creating a book.
     */
    public function test_if_name_is_required_when_creating_a_book():void
    {
        $response = $this->create_book_request(['name' => '']);

        $response->assertStatus(422);
    }

    /**
     * Test if isbn is required when creating a book.
     */
    public function test_if_isbn_is_required_when_creating_a_book():void
    {
        $response = $this->create_book_request(['isbn' => '']);

        $response->assertStatus(422);
    }

    /**
     * Test if value is required when creating a book.
     */
    public function test_if_value_is_required_when_creating_a_book():void
    {
        $response = $this->create_book_request(['value' => '']);

        $response->assertStatus(422);
    }

    /**
     * Test if isbn should be a number when creating a book.
     */
    public function test_if_isbn_should_be_a_number_when_creating_a_book():void
    {
        $response = $this->create_book_request(['isbn' => 'abc']);

        $response->assertStatus(422);
    }

    /**
     * Test if value should be a number when creating a book.
     */
    public function test_if_value_should_be_a_number_when_creating_a_book():void
    {
        $response = $this->create_book_request(['value' => 'abc']);

        $response->assertStatus(422);
    }
}
