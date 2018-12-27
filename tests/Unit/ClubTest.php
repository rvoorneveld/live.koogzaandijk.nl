<?php

namespace Tests\Unit;

use App\Club;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubTest extends TestCase
{

    use RefreshDatabase;

    public function testItHasAPath(): void
    {
        $club = factory(Club::class)->create();

        $this->assertEquals("/club/{$club->id}", $club->path());
    }

}
