<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\ProductHeader;
use Faker\Generator as Faker;

$factory->define(ProductHeader::class, function (Faker $faker) {
    return [
        'prd_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'prd_hd_caption' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'prd_hd_image' => 'default.jpg',
        'prd_hd_active' => 0
    ];
});
