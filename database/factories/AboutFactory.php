<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\About;
use Faker\Generator as Faker;

$factory->define(About::class, function (Faker $faker) {
    return [
        'ab_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'ab_caption' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'ab_desc' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'ab_image' => 'default.jpg',
        'ab_active' => 0
    ];
});
