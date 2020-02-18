<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * @test
     */

    public function newHttpTest()
    {
        $response = $this->get('/lent/new');
        $response->assertStatus(200)->assertViewIs('kashikari.new');
    }

    public function indexHttpTest()
    {
        $this->get('/lent')->assertStatus(200)->assertViewIs('kashikari');
    }

    public function categorySearchHttpTest()
    {
        $response = $this->get('/lent/category/{id}');
        $response->assertStatus(200)->assertViewIs('kashikari.categorysearch');
    }
}
