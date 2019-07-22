<?php

namespace Tests\Unit;

use App\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_job_can_be_favorite()
    {
        $this->signIn();
        $job = factory(Job::class)->create();
        $job->favorite();
        $this->assertTrue($job->isFavorited());
        $this->assertTrue($job->is_favorited);
    }

    /** @test */
    function a_job_can_be_unfavorited()
    {
        $this->signIn();
        $job = factory(Job::class)->create();
        $job->favorite();
        $job->unfavorite();

        $this->assertFalse($job->isFavorited());
        $this->assertFalse($job->is_favorited);
    }

    /** @test */
    function a_job_can_be_favorited_only_once()
    {
        $this->signIn();
        $job = factory(Job::class)->create();
        try {
            $this->post("/jobs/{$job->id}/favorite");
            $this->post("/jobs/{$job->id}/favorite");
        } catch (\Exception $e) {
            $this->fail('Did not expect to insert same record.');
        }

        $this->assertCount(1, $job->favorites);
    }
}