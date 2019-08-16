<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Job;
use App\JobApplication;
use App\User;
use Faker\Generator as Faker;

$factory->define(JobApplication::class, function (Faker $faker) {
    return [
        'job_id'       => function () {
            if (Job::count()) {
                return Job::all()->random()->id;
            } else {
                return factory(Job::class)->create()->id;
            }
        },
        'employer_id'  => function () {
            return factory(User::class)->create(['user_type' => 'employer'])->id;
        },
        'user_id'      => function () {
            return factory(User::class)->create(['user_type' => 'user'])->id;
        },
        'name'         => $faker->name,
        'phone_number' => $faker->numberBetween(100, 1000),
        'message'      => '',
        'resume'       => '',
        'email'        => $faker->email
    ];
});
