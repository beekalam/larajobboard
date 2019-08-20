<?php

namespace Tests\Unit;

use App\Job;
use App\JobApplication;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class JobApplyTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function required_fields_to_apply_to_job()
    {
        $job = factory(Job::class)->create();
        $this->post('/jobs/' . $job->id . '/apply', [])
             ->assertSessionHasErrors('name')
             ->assertSessionHasErrors('email')
             ->assertSessionHasErrors('phone_number')
             ->assertSessionHasErrors('resume');
    }

    /** @test */
    function to_apply_to_job_only_pdf_word_files_are_accepted()
    {
        $job = $this->create_job();
        $this->post('/jobs/' . $job->id . '/apply', [
            'name'         => 'john smith',
            'email'        => 'john@demo.com',
            'phone_number' => '1234',
            'resume'       => UploadedFile::fake()->image('resume.jpg')
        ])->assertSessionHasErrors('resume');
    }

    /** @test */
    function user_can_apply_to_a_job()
    {
        $job = $this->create_job();
        $this->post('/jobs/' . $job->id . '/apply', [
            'name'         => 'john smith',
            'email'        => 'john@demo.com',
            'phone_number' => '1234',
            'resume'       => UploadedFile::fake()->create('resume.pdf')
        ]);
        $this->assertDatabaseHas('job_applications', [
            'name'         => 'john smith',
            'email'        => 'john@demo.com',
            'phone_number' => '1234',
        ]);
    }

    /** @test */
    function can_upload_resume()
    {
        Storage::fake('public');
        $job = $this->create_job();
        $this->post('/jobs/' . $job->id . '/apply', [
            'name'         => 'john smith',
            'email'        => 'john@demo.com',
            'phone_number' => '1234',
            'resume'       => UploadedFile::fake()->create('resume.pdf')
        ]);

        Storage::disk('public')->assertExists(JobApplication::first()->resume);
    }

    /** @test */
    function employer_can_view_applicants()
    {
        $employer = $this->employerSignIn();
        factory(Job::class)->create(['title' => 'my_job', 'user_id' => $employer->id]);
        $user = factory(User::class)->create(['name' => 'john doe']);
        $user2 = factory(User::class)->create();
        factory(JobApplication::class)->create([
            'employer_id' => $employer->id,
            'user_id'     => $user->id
        ]);
        factory(Job::class)->create(['title' => 'another_job', 'user_id' => $user2->id]);
        $this->get('applicants')
             ->assertSee($user->name)
             ->assertDontSee($user2->name);
    }

    /** @test */
    function users_can_view_jobs_they_applied_to()
    {
        $user = $this->userSignIn();
        factory(JobApplication::class)->create(['user_id' => auth()->id()]);
        $this->get('/applied')
             ->assertSee($user->name)
             ->assertSee($user->phone);
    }

    private function create_job()
    {
        $employer = factory(User::class)->create(['user_type' => 'employer']);
        return factory(Job::class)->create(['user_id' => $employer->id]);
    }


}