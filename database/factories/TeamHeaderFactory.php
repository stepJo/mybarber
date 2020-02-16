<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\TeamHeader;
use Faker\Generator as Faker;

$factory->define(TeamHeader::class, function (Faker $faker) {
    return [
        'tm_hd_title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'tm_hd_caption' => $faker->sentence($nbWords = 15, $variableNbWords = true),
        'tm_hd_active' => 0
    ];
});
