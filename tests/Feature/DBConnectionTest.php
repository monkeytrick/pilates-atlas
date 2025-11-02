<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DBConnectionTest extends TestCase
{

    public function test_database_connection(): void
    {
        $this->assertNotNull(DB::connection()->getPdo());
    }
}
