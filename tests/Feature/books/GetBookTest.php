<?php

namespace Tests\Feature\books;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetBookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test if can retrieve a book
     */
    public function test_if_can_retrieve_a_book(): void
    {
        Book::factory()->make()->save();
        $book = Book::all()->last();

        $authHeader = $this->get_auth_http_header($this->create_user());

        $response = $this->get('/api/books/' . $book->id, $authHeader);
        $response->assertStatus(200);

        $this->assertArrayHasKey('id', $response->decodeResponseJson()->json());
    }
}
