<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\BlogCategory;
use Faker\Generator as Faker;

$factory->define(BlogCategory::class, function (Faker $faker) {
    return [
        'blog_cat_name' => $faker->sentence($nbWords = 1, $variableNbWords = true),
    ];
});
