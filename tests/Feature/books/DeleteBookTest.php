<?php

namespace Tests\Feature\books;

use App\Models\Book;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeleteBookTest extends TestCase
{
    use RefreshDatabase;

    /**
     * test if can delete a book
     */
    public function test_if_can_delete_a_book(): void
    {
        Book::factory()->make()->save();
        $book = Book::all()->last();

        $authHeader = $this->get_auth_http_header($this->create_user());

        $response = $this->delete('/api/books/' . $book->id, [], $authHeader);
        $response->assertStatus(200);
        $this->assertEmpty(Book::all()->toArray());
    }
}
