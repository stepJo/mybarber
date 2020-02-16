<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Testimonial;
use Faker\Generator as Faker;

$factory->define(Testimonial::class, function (Faker $faker) {
    return [
        'test_name' => $faker->name,
        'test_caption' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'test_image' => 'default.jpg'
    ];
});
