<?php

namespace Tests\Unit;

use App\Category;
use App\Job;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadJobsTest extends TestCase
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

    /** @test */
    function can_search_jobs()
    {
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create(['category_id' => $category->id, 'title' => 'test title']);
        $this->get('/search?title=test+title')
             ->assertStatus(200)
             ->assertSee('test title');
    }

    /** @test */
    function an_authenticated_user_can_view_posted_jobs()
    {
        $user = $this->signIn();
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create(['category_id' => $category->id, 'title' => 'test title']);
        $this->get('/posted')
             ->assertSee('test title');
    }

}