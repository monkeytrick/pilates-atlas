<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_homepage_renders(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeText('Pilates Atlas');

    }
}
