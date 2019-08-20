<?php

namespace Tests\Unit;

use App\JobApplication;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_get_number_of_job_seekers_count()
    {
        factory(User::class, 2)->create([
            'user_type' => 'user'
        ]);
        $this->assertEquals(2, User::userCount());
    }

    /** @test */
    function can_get_number_of_employers_count()
    {
        factory(User::class, 2)->create([
            'user_type' => 'employer'
        ]);
        $this->assertEquals(2, User::employerCount());
    }

    /** @test */
    function can_tell_if_user_is_admin()
    {
        $this->signIn(['user_type' => 'admin']);
        $this->assertTrue(auth()->user()->isAdmin());
    }

    /** @test */
    function can_tell_if_user_is_employer()
    {
        $this->signIn(['user_type' => 'employer']);
        $this->assertFalse(auth()->user()->isAdmin());
        $this->assertTrue(auth()->user()->isEmployer());
    }

    /** @test */
    function can_get_applied_to_jobs()
    {
        $user = factory(User::class)->create(['user_type' => 'user']);
        factory(JobApplication::class)->create(['user_id' => $user->id]);
        $this->assertEquals(1, $user->appliedJobs->count());
    }
}