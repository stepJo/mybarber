<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\BlogHeader;
use Faker\Generator as Faker;

$factory->define(BlogHeader::class, function (Faker $faker) {
    return [
        'blog_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'blog_hd_caption' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'blog_hd_image' => 'default.jpg',
        'blog_hd_active' => 0
    ];
});
