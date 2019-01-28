<?php

namespace Tests\Unit;

use App\Club;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testItHasAPath(): void
    {
        $club = factory(Club::class)->create();

        $this->assertEquals("/clubs/{$club->id}", $club->path());
    }

}
