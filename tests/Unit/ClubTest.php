<?php

namespace Tests\Unit;

use App\Club;
use App\Team;
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

    public function testItHasTeams(): void
    {
        $club = factory(Club::class)->create();
        factory(Team::class, $expected = 2)->create(['club_id' => $club->id]);

        $this->assertCount($expected, Club::find($club->id)->teams()->get());
    }

}
