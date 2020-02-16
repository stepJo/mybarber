<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\ReservationHeader;
use Faker\Generator as Faker;

$factory->define(ReservationHeader::class, function (Faker $faker) {
    return [
        'rsv_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'rsv_hd_caption' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'rsv_hd_image' => 'default.jpg',
        'rsv_hd_active' => 0
    ];
});
