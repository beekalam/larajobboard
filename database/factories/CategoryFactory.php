<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    $name = $faker->sentence;
    $slug = str_slug($name);
    return [
        'name'      => $name,
        'slug'      => $slug,
        'job_count' => 0
    ];
});
