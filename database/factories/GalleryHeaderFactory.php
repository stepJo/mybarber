<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\GalleryHeader;
use Faker\Generator as Faker;

$factory->define(GalleryHeader::class, function (Faker $faker) {
    return [
        'gal_hd_title' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'gal_hd_image' => 'default.jpg',
        'gal_hd_active' => 0
    ];
});
