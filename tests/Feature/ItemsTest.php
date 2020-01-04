<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ItemsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testItemPageIsWorkingCorrectly()
    {
        $response = $this->get('/items');
        // $response->assertSeeText('Stored Items');
        $response->assertStatus(200);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNoItemWhenDatabaseIsEmpty()
    {
        $response = $this->get('/items');
        // $response->assertSeeText('No items stored');
        $response->assertStatus(200);
    }

}
