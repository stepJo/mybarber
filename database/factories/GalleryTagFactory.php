<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\GalleryTag;
use Faker\Generator as Faker;

$factory->define(GalleryTag::class, function (Faker $faker) {
    return [
        'gal_tag_name' => $faker->word
    ];
});
