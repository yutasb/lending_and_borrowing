<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KashikariTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */



    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
