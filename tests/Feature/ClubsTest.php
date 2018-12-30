<?php

namespace Tests\Feature;

use App\Club;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubsTest extends TestCase
{

    use WithFaker, RefreshDatabase;

    public function testUserCanCreateAClub(): void
    {
        $attributes = [
            'name' => $this->faker->word,
        ];

        $this->post('clubs', $attributes)->assertRedirect('/clubs' );

        $this->assertDatabaseHas('clubs', $attributes);

        $this->get('clubs')->assertSee($attributes['name']);
    }

    public function testClubRequiresAName(): void
    {
        $attributes = factory(Club::class)->raw(['name' => '',]);

        $this->post('clubs', $attributes)->assertSessionHasErrors('name');
    }

    public function testUserCanViewAClub(): void
    {
        $this->withoutExceptionHandling();

        $club = factory(Club::class)->create();

        $this->get($club->path())->assertSee($club->name);
    }

}
