<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\TestimonialHeader;
use Faker\Generator as Faker;

$factory->define(TestimonialHeader::class, function (Faker $faker) {
    return [
        'test_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'test_hd_caption' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'test_hd_image' => 'default.jpg',
        'test_hd_active' => 0
    ];
});
