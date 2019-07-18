<?php

namespace Tests\Unit;

use App\Country;
use App\State;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function employer_can_update_his_profile()
    {
        $user = $this->signIn(['user_type' => 'employer']);
        $country = factory(Country::class)->create();
        $state = factory(State::class)->create();
        $attributes = [
            'phone'     => '123',
            'address'   => 'changed address',
            'address_2' => 'changed address_2',
            'country'   => $country->id,
            'state'     => $state->id,
            'city'      => 'shiraz'
        ];
        $this->put('/update-profile/' . $user->id, $attributes);
        $this->assertDatabaseHas('users', [
            'phone'        => '123',
            'address'      => 'changed address',
            'address_2'    => 'changed address_2',
            'country_id'   => $country->id,
            'country_name' => $country->country_name,
            'state_id'     => $state->id,
            'state_name'   => $state->state_name,
            'city'         => 'shiraz'
        ]);
    }
}