<?php

namespace Tests\Unit;

use App\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JobTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    function can_filter_jobs_based_on_job_type()
    {
        factory(Job::class)->create(['job_type' => 'part_time']);
        $this->assertEquals('part_time', Job::filter([
            'job_type' => 'part_time'
        ])->first()->job_type);
    }

    /** @test */
    function can_filter_jobs_based_on_job_title()
    {
        factory(Job::class)->create(['title' => 'test title']);
        $this->assertEquals('test title', Job::filter([
            'title'    => 'test title'
        ])->first()->title);
    }

    /** @test */
    function can_filter_job_based_on_state_name()
    {
        factory(Job::class)->create(['state_name' => 'mystate']);
        $this->assertEquals('mystate', Job::filter([
            'state_name' => 'mystate',
        ])->first()->state_name);
    }

    /** @test */
    function can_filter_jobs_based_on_country_name()
    {
        factory(Job::class)->create([ 'country_name' => 'iran', ]);
        $this->assertEquals('iran', Job::filter([
            'country_name' => 'iran'
        ])->first()->country_name);
    }

    /** @test */
    function can_get_number_of_pending_jobs()
    {
        factory(Job::class, 2)->create();
        $this->assertEquals(2, Job::pending()->get()->count());
    }

    /** @test */
    function can_get_number_of_approved_jobs()
    {
        factory(Job::class, 2)->create(['status' => '1']);
        $this->assertEquals(0, Job::Pending()->get()->count());
        $this->assertEquals(2, Job::Approved()->get()->count());
    }

    /** @test */
    function can_get_number_of_blocked_jobs()
    {
        factory(Job::class, 2)->create(['status' => '2']);
        $this->assertEquals(0, Job::Pending()->get()->count());
        $this->assertEquals(0, Job::Approved()->get()->count());
        $this->assertEquals(2, Job::Blocked()->get()->count());
    }

    /** @test */
    function can_get_number_of_active_jobs()
    {
        factory(Job::class, 5)->create(['status' => '1']);
        factory(Job::class, 2)->create(['deadline' => date('Y-m-d H:i:s', time() - 100), 'status' => '1']);
        $this->assertEquals(5, Job::active()->count());
    }

    /** @test */
    function can_filter_jobs_by_position()
    {
        $job = factory(Job::class)->create(['position' => 'php developer']);
        $this->assertEquals('php developer',Job::filter(['title' => 'php'])->first()->position);
    }
}