<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CountryStudiosTest extends TestCase
{
    /**
     * A basic feature test example.
     */

    //get all 
    public function test_studios_returned_for_listed_countries(): void
    {
        $response = $this->get('/country?id=1'); // Assuming country with ID 1 exists

        $response->assertStatus(200);
        $response->assertViewHas('studios');
    }



    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
