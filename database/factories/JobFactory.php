<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use App\Job;
use App\User;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    $title = $faker->word;
    $slug = str_slug($title);
    $currency = ['USD', 'EUR'];
    $gender = ['male', 'female', 'any'];
    $job_type = ['full_time', 'part_time', 'contract', 'temporary', 'commission', 'internship'];
    $experience_level = ['mid', 'entry', 'senior'];
    $cycle = ['monthly', 'yearly', 'weekly', 'daily', 'hourly'];

    return [
        'user_id'                   => function () {
            if (User::count() > 0) {
                return User::all()->random()->id;
            } else {
                return factory(User::class)->create()->id;
            }
        },
        'title'                     => $title,
        'slug'                      => $slug,
        'position'                  => $faker->word,
        'category_id'               => function () {
            if (Category::count() > 0) {
                return Category::all()->random()->id;
            } else {
                return factory(Category::class)->create()->id;
            }
        },
        'salary'                    => $faker->numberBetween(30000, 40000),
        'salary_max'                => $faker->numberBetween(41000, 100000),
        'cycle'                     => $cycle[array_rand($cycle)],
        'currency'                  => $currency[array_rand($currency)],
        'gender'                    => $gender[array_rand($gender)],
        'job_type'                  => $job_type[array_rand($job_type)],
        'experience_level'          => $experience_level[array_rand($experience_level)],
        'description'               => $faker->paragraph,
        'skills'                    => $faker->paragraph,
        'responsibilities'          => str_repeat($faker->sentence(5) . PHP_EOL, 4),
        'educational_requirements'  => str_repeat($faker->sentence(5) . PHP_EOL, 2),
        'experience_requirements'   => str_repeat($faker->sentence(5) . PHP_EOL, 2),
        'additional_requirements'   => $faker->sentence,
        'benefits'                  => str_repeat($faker->sentence(6) . PHP_EOL, 6),
        'apply_instructions'        => $faker->sentence,
        'country_id'                => 1,
        'country_name'              => 'USA',
        'state_id'                  => '1',
        'state_name'                => 'Arizona',
        'city_name'                 => 'arizona',
        'experience_required_years' => 1,
        'views'                     => 0,
        'deadline'                  => date('Y-m-d H:i:s', time() + 10000),
        'status'                    => 0
    ];
});
