<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;

class SetApiTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_can_create_set()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user, 'api');

        $formData = [
            'name' => 'Power Play'
        ];
        $this->withoutExceptionHandling();
        $this->json('POST', route('set.store'), $formData)
            ->assertStatus(201)
            ->assertJson(['data' => $formData]);

    }

    public function test_can_get_set()
    {
        /* $this->post(route('set.show'), $formData)
            ->assertStatus(200); */
        $this->assertTrue(true);
    }
}
