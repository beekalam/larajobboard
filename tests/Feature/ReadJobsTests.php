<?php

namespace Tests\Unit;

use App\Category;
use App\Job;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadJobsTests extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_see_job_title_in_jobs()
    {
        $job = factory(Job::class)->create();

        $this->get('/jobs')
             ->assertStatus(200)
             ->assertSee($job->title);
    }

    /** @test */
    function can_view_listing_of_jobs_based_on_category()
    {
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create(['category_id' => $category->id]);
        $this->get('/cat/' . $category->id)
             ->assertStatus(200)
             ->assertSee($job->title);
    }

    /** @test */
    function can_view_single_job()
    {
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create(['category_id' => $category->id]);
        $this->get('/jobs/' . $category->id)
             ->assertStatus(200)
             ->assertSee($job->title)
             ->assertSee($job->description)
             ->assertSee($job->country_name)
             ->assertSee(ucfirst($job->city_name));
    }
}