<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\State;
use Faker\Generator as Faker;

$factory->define(State::class, function (Faker $faker) {
    return [
        'state_name' => $faker->name,
        'country_id' => function () {
            return \App\Country::all()->random()->id;
        }
    ];
});
