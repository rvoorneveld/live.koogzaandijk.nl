<?php

namespace Tests\Feature;

use App\Club;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClubsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    public function testGuestsMayNotManageProjects(): void
    {
        $this->get('clubs')
             ->assertRedirect($uri = 'login');

        $this->post('clubs')
             ->assertRedirect('login');

        $club = factory(Club::class)->create();

        $this->get($club->path())
             ->assertRedirect($uri);
    }

    public function testUserCanOnlySeeAttachedClubs(): void
    {
        $this->signIn();

        $club = factory(Club::class)->create();

        $this->get($club->path())->assertStatus(403);
    }

    public function testUserCanCreateAClub(): void
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->signIn($user);

        $this->get('clubs/create')
             ->assertStatus(200);

        $attributes = [
            'name' => $this->faker->word,
        ];

        $this->post('clubs', $attributes)
             ->assertRedirect('/clubs');

        $this->assertDatabaseHas('clubs', $attributes);
        $this->assertDatabaseHas('club_user', [
//            'post_id' => ?,
            'user_id' => auth()->user()->id,
        ]);

        $this->get('clubs')
             ->assertSee($attributes['name']);
    }

    public function testClubRequiresAName(): void
    {
        $this->signIn();

        $attributes = factory(Club::class)->raw(['name' => '',]);

        $this->post('clubs', $attributes)->assertSessionHasErrors('name');
    }

    public function testUserCanViewAClub(): void
    {
        $this->signIn();

        $club = factory(Club::class)->create();
        $club->users()->attach(auth()->user());

        $this->get($club->path())->assertSee($club->name);
    }

}
