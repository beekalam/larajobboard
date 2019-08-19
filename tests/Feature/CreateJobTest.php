<?php

namespace Tests\Unit;

use App\Category;
use App\Job;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CreateJobTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function authenticated_users_may_post_jobs()
    {
        $this->adminSignIn();

        $category = factory(Category::class)->create();
        $job = factory(Job::class)->make(['category_id' => $category->id, 'title' => 'test title']);
        $job['category'] = $job['category_id'];
        $this->post('/jobs', $job->toArray())
             ->assertRedirect('/posted');
        $this->assertDatabaseHas('jobs', ['title' => 'test title']);
    }

    /** @test */
    function authenticated_users_may_edit_jobs()
    {
        $user = $this->employerSignIn();
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create(['category_id' => $category->id, 'title' => 'test title']);
        $arr = $job->toArray();
        $arr['title'] = 'changed title';
        $arr['category'] = factory(Category::class)->create()->id;
        $arr['country'] = 1;
        $arr['state'] = 1;
        $this->patch("/jobs/{$job->id}/", $arr)
             ->assertRedirect('/posted');
        $this->assertDatabaseHas('jobs', ['title' => 'changed title', 'category_id' => $arr['category']]);
    }

    /** @test */
    function authenticated_admin_may_delete_jobs()
    {
        $this->signIn(['user_type' => 'admin']);
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create(['category_id' => $category->id, 'title' => 'test title']);
        $this->delete("/jobs/{$job->id}")
             ->assertRedirect("/posted");
        $this->assertEquals(0, Job::count());
    }

    /** @test */
    function authorized_users_may_only_delete_the_jobs_they_posted()
    {
        $this->signIn();
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create([
            'category_id' => $category->id,
            'title'       => 'test title',
            'user_id'     => factory(User::class)->create()->id
        ]);
        $this->delete("/jobs/{$job->id}")
             ->assertStatus(403);
    }

    /** @test */
    function authorized_users_may_only_update_the_jobs_they_posted()
    {
        $user = $this->signIn();
        $category = factory(Category::class)->create();
        $job = factory(Job::class)->create([
            'category_id' => $category->id,
            'title'       => 'test title',
            'user_id'     => factory(User::class)->create()->id
        ]);
        $arr = $job->toArray();
        $arr['title'] = 'changed title';
        $arr['category'] = factory(Category::class)->create()->id;
        $arr['country'] = 1;
        $arr['state'] = 1;
        $this->patch("/jobs/{$job->id}/", $arr)
             ->assertStatus(403);
    }

    /** @test */
    function authorized_employer_may_view_his_jobs_only()
    {
        $user = factory(User::class)->create(['user_type' => 'admin']);
        $first_job = factory(Job::class)->create(['title' => 'first_job', 'user_id' => $user->id]);
        $employer = $this->employerSignIn();
        $second_job = factory(Job::class)->create(['title' => 'second_job', 'user_id' => $employer->id]);

        $this->get('/posted')
             ->assertSee($second_job->title)
             ->assertDontSee($first_job->title);
    }

    /** @test */
    function authorized_user_may_create_jobs_with_anywhere_flag()
    {
        $this->withoutExceptionHandling();
        $this->signIn(['user_type' => 'admin']);
        $job = factory(Job::class)->make(['anywhere_location' => '1']);
        $job['category'] = $job['category_id'];
        $this->post('/jobs', $job->toArray())
             ->assertRedirect('/posted');
        $this->assertDatabaseHas('jobs', ['anywhere_location' => 1]);
    }


}