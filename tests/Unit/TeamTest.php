<?php

namespace Tests\Unit;

use App\Club;
use App\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamTest extends TestCase
{

    use RefreshDatabase;

    public function testItHasAPath(): void
    {
        $club = factory(Club::class)->create();
        $team = factory(Team::class)->create(['club_id' => $club->id]);

        $this->assertEquals("/team/{$team->id}", $team->path());
    }

    public function testATeamBelongsToAClub(): void
    {
        $club = factory(Club::class)->create();
        $team = factory(Team::class)->create(['club_id' => $club->id]);

        $this->assertCount(1, $team->club()->get());
    }

}
