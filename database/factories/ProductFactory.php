<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
	$prd_name = $faker->sentence($nbWords = 2, $variableNbWords = true);
    return [
        'prd_name' => $prd_name,
        'prd_name_slug' => Str::slug($prd_name, '-'),
        'prd_price' => $faker->numberBetween($min = 10000, $max = 100000),
        'prd_image' => 'default.jpg'
    ];
});
