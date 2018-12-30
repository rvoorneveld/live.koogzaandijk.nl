<?php

namespace Tests\Feature;

use App\Club;
use App\Team;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeamsTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function testUserCanCreateATeam(): void
    {
        $this->withoutExceptionHandling();

        $club = factory(Club::class)->create();

        $attributes = [
            'name' => $this->faker->randomLetter.$this->faker->randomDigitNotNull,
            'club_id' => $club->id,
        ];

        $this->post('teams', $attributes)->assertRedirect($uri = "/club/{$club->id}");

        $this->assertDatabaseHas('teams', $attributes);

        $this->get($uri)->assertSee($attributes['name']);
    }

    public function testTeamRequiresAName(): void
    {
        $attributes = factory(Club::class)->raw(['name' => '',]);

        $this->post('teams', $attributes)->assertSessionHasErrors('name');
    }

    public function testTeamRequiresAClub(): void
    {
        $attributes = factory(Club::class)->raw(['club_id' => '',]);

        $this->post('teams', $attributes)->assertSessionHasErrors('club_id');
    }

    public function testUserCanViewATeam(): void
    {
        $this->withoutExceptionHandling();
        $club = factory(Club::class)->create();

        $team = factory(Team::class)->create(['club_id' => $club->id]);

        $this->get($team->path())->assertSee($team->name);
    }

}
