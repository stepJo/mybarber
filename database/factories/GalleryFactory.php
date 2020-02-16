<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Gallery;
use App\GalleryTag;
use Faker\Generator as Faker;

$factory->define(Gallery::class, function (Faker $faker) {
    return [
    	'gal_tag_id' => GalleryTag::all()->random()->gal_tag_id,
        'gal_title' => $faker->sentence($nbWords = 2, $variableNbWords = true),
        'gal_image' => 'default.jpg',
    ];
});
