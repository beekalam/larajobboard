<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Page;
use Faker\Generator as Faker;

$factory->define(Page::class, function (Faker $faker) {
    $page_types=['static_page','blog_post'];
    return [
        'title' => $faker->sentence,
        'content' => $faker->paragraph,
        'feature_image' => $faker->word,
        'page_type' => $page_types[array_rand($page_types)]
    ];
});
