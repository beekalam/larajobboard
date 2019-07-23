<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function user_can_be_updated()
    {
        $this->signIn(['user_type' => 'admin']);
        $user = factory(User::class)->create();
        $attributes = [
            'name'    => 'moh',
            'email'   => 'test@test.com',
            'gender'  => 'male',
            'phone'   => '1234',
            'address' => 'address changed'
        ];
        $this->put('/users/' . $user->id, $attributes);
        $this->assertDatabaseHas('users', $attributes);
    }

    /** @test */
    function only_admin_can_update_users()
    {
        $this->signIn(['user_type' => 'employer']);
        $user = factory(User::class)->create();
        $attributes = [
            'name'    => 'moh',
            'email'   => 'test@test.com',
            'gender'  => 'male',
            'phone'   => '1234',
            'address' => 'address changed'
        ];
        $this->put('/users/' . $user->id, $attributes);
        $this->assertDatabaseMissing('users', $attributes);
    }

    /** @test */
    function user_name_is_required_to_update_user()
    {
        $this->signIn(['user_type' => 'admin']);
        $user = factory(User::class)->create();
        $attributes = [
            'email'   => 'test@test.com',
            'gender'  => 'male',
            'phone'   => '1234',
            'address' => 'address changed'
        ];
        $this->put('/users/' . $user->id, $attributes)
             ->assertSessionHasErrors('name');
    }

    /** @test */
    function user_email_is_required_to_update_user()
    {
        $this->signIn(['user_type' => 'admin']);
        $user = factory(User::class)->create();
        $attributes = [
            'name'    => 'some name',
            'gender'  => 'male',
            'phone'   => '1234',
            'address' => 'address changed'
        ];
        $this->put('/users/' . $user->id, $attributes)
             ->assertSessionHasErrors('email');
    }
}