<?php

namespace Tests\Unit;

use App\Job;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateJobTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function authenticated_users_may_post_jobs()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        // var_dump(factory(Job::class)->make()->toArray());;exit;
        $this->post('/jobs', $job = factory(Job::class)->make()->toArray());
        $this->assertDatabaseHas('jobs', ['title' => $job['title']]);
    }
}