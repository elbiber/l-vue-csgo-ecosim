<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class ItemTest extends TestCase
{
    use RefreshDatabase;
    // use WithoutMiddleware;
    public function test_can_create_item()
    {
        $user = $this->createDummyUser();
        $this->actingAs($user, 'api');
        $formData = [
            'name' => 'Power Play',
            'type' => 'pistol',
            'price' => 2000,
            'kill_award' => 200,
            'restricted_to' => 'ct',
            'image_filename' => 'test.png'
        ];
        $this->withoutExceptionHandling();
        $this->json('POST', route('items.store'), $formData)
            ->assertStatus(201)
            ->assertJson($formData);
    }
    private function createDummyUser(): User
    {

        return User::create(
            [
                'name' => 'Ben Jerry',
                'id_admin' => 1,
                'email' => 'example@mail.de',
                'email_verified_at' => now(),
                'password' => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ]);
    }
}
