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

        $response = $this->get('/api/books/' . $book->id);
        $response->assertStatus(200);

        $this->assertArrayHasKey('id', $response->decodeResponseJson()->json());
    }
}
