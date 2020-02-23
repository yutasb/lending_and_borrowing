<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HttpTest extends TestCase
{
    /**
     * @test
     */

    public function testNewHttp()
    {
        $response = $this->get('/lent/new');
        $response->assertStatus(200)->assertViewIs('kashikari.new');
    }
    /**
     * @test
     */
    public function testIndexHttp()
    {
        $response = $this->get('/lent');
        $response->assertSuccessful();
    }
    /**
     * @test
     */
    public function testCategorySearchHttp()
    {
        $response = $this->get('/lent/category/{id}');
        $response->assertStatus(200)->assertViewIs('kashikari.categorysearch');
    }
}
