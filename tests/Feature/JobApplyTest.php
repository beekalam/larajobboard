<?php

namespace Tests\Unit;

use App\Job;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\JobApplication;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $employer = factory(User::class)->create(['user_type' => 'employer']);
        $job = factory(Job::class)->create(['user_id' => $employer->id]);
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
        $employer = factory(User::class)->create(['user_type' => 'employer']);
        $job = factory(Job::class)->create(['user_id' => $employer->id]);
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
        $employer = factory(User::class)->create(['user_type' => 'employer']);
        $job = factory(Job::class)->create(['user_id' => $employer->id]);
        $this->post('/jobs/' . $job->id . '/apply', [
            'name'         => 'john smith',
            'email'        => 'john@demo.com',
            'phone_number' => '1234',
            'resume'       => UploadedFile::fake()->create('resume.pdf')        
        ]);

        Storage::disk('public')->assertExists(JobApplication::first()->resume);

    }

}