<?php

namespace Tests\Feature\Api;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class AuthTest extends TestCase
{
    /**
     * Test Validation Auth
     */
    public function test_ValidationAuth(): void
    {
        $response = $this->postJson('/api/auth/token');

        $response->assertStatus(422);
    }

    /**
     *Test Auth User Fake
     */
    public function test_AuthClientFake(): void
    {
        $payload = [
            'email' => 'fake@mail.com',
            'password' => '1234567',
            'device_name' => Str::random(10),
        ];
        $response = $this->postJson("/api/auth/token", $payload);

        $response->assertStatus(404)
                    ->assertExactJson([
                        'message' => trans('messages.invalid_credentials')
                    ]);
    }

    /**
     *Test Auth Success Client
     */
    public function test_AuthClientSuccess(): void
    {
        $client = Client::factory()->create();

        $payload = [
            'email' => $client->email,
            'password' => 'password',
            'device_name' => Str::random(10),
        ];

        $response = $this->postJson("/api/auth/token", $payload);
        //$response->dump();

        $response->assertStatus(200)
                    ->assertJsonStructure(['token']);
    }
}
