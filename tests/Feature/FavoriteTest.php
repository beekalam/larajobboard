<?php

namespace Tests\Unit;

use App\Favorite;
use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoriteTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function guests_may_not_favorite_jobs()
    {
        $job = factory(Job::class)->create();
        $this->post("/jobs/{$job->id}/favorite")
             ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_favorite_a_job()
    {
        $user = $this->signIn();
        $job = factory(Job::class)->create();

        $this->post("/jobs/{$job->id}/favorite");
        $this->assertDatabaseHas('favorites', [
            'favorited_id'   => $job->id,
            'favorited_type' => Job::class
        ]);
    }

    /** @test */
    function an_authenticated_user_may_unfavorite_a_job()
    {
        $user = $this->signIn();
        $job = factory(Job::class)->create();
        $job->favorite();

        $this->delete("/jobs/{$job->id}/unfavorite");
        $this->assertDatabaseMissing('favorites', [
            'favorited_id'   => $job->id,
            'favorited_type' => Job::class
        ]);
    }


}