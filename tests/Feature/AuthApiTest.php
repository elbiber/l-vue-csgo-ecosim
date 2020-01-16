<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use Illuminate\Support\Str;

use App\Http\Middleware as Middleware;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_login_success()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
/*     
    public function test_user_registration_success()
    {
        
        $params = [
            'name' => 'Ben Jerry',
            'email' => 'example@mail.de',
            'password' => '1234',
            'password_confirmation' => '1234',
        ];

        $response = $this->post('/api/register', $params);
        $response->assertStatus(200);

    }
    public function test_successful_user_login()
    {
        $user = $this->createDummyUser();
        // $this->assertDatabaseHas('users', $user->toArray());
        //$response = $this->actingAs($user)->get('/login');
        $params = ['email' => 'example@mail.de', 'password' => '1234'];

        $response = $this->post('/api/login', $params);
            
        $response->assertStatus(200);

        
    } */
    private function createDummyUser(): User
    {

        return User::create(
            [
                'name' => 'Ben Jerry',
                'id_admin' => 0,
                'email' => 'example@mail.de',
                'email_verified_at' => now(),
                'password' => bcrypt('1234'),
                'remember_token' => Str::random(10),
            ]);
    }
}
