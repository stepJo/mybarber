<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Slider;
use Faker\Generator as Faker;

$factory->define(Slider::class, function (Faker $faker) {
    return [
        'slider_title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'slider_caption' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'slider_image' => 'default.jpg'
    ];
});
