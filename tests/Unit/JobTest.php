<?php

namespace Tests\Unit;

use App\Category;
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
        factory(Job::class)->create(['title' => 'test title','job_type' => 'full_time']);
        $this->assertEquals('test title', Job::filter([
            'job_type' => 'part_time',
            'title' => 'test title'
        ])->first()->title);
    }

    /** @test */
    function can_filter_job_based_on_state_name()
    {
        factory(Job::class)->create(['title' => 'test title','job_type' => 'full_time','state_name'=>'mystate']);
        $this->assertEquals('mystate', Job::filter([
            'job_type' => 'part_time',
            'title' => 'my title',
            'state_name' => 'mystate'
        ])->first()->state_name);
    }
}