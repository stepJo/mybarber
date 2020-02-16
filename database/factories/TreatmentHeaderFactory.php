<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\TreatmentHeader;
use Faker\Generator as Faker;

$factory->define(TreatmentHeader::class, function (Faker $faker) {
    return [
        'treat_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'treat_hd_caption' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'treat_hd_image' => 'default.jpg',
        'treat_hd_active' => 0
    ];
});
