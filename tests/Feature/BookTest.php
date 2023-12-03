<?php

namespace Tests\Feature;

use Database\Factories\BookFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $payload = BookFactory::new()->definition();
        $response = $this->post('/api/v1/book',$payload);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'book' => [
                'intitulé',
                'date de publication',
                'ecrivain',
                'id',
            ],
        ]);
    }
}
