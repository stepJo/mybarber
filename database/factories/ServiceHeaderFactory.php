<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\ServiceHeader;
use Faker\Generator as Faker;

$factory->define(ServiceHeader::class, function (Faker $faker) {
    return [
        'serv_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'serv_hd_caption' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'serv_hd_image' => 'default.jpg',
        'serv_hd_active' => 0
    ];
});
