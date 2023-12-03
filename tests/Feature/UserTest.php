<?php

namespace Tests\Feature;

use Database\Factories\UserFactory;
use Tests\TestCase;


class UserTest extends TestCase
{

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $payload =  UserFactory::new()->definition();
        $response = $this->post('/api/v1/auth/register',$payload);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'message',
            'user' => [
                'nom',
                'prenom',
                'address',
                'id',
            ],
        ]);
    }
}
