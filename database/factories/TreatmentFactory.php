<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Treatment;
use App\TreatmentType;
use Faker\Generator as Faker;

$factory->define(Treatment::class, function (Faker $faker) {
	$treat_name = $faker->sentence($nbWords = 2, $variableNbWords = true);
    return [
    	'treat_type_id' => TreatmentType::all()->random()->treat_type_id,
        'treat_name' => $treat_name,
        'treat_name_slug' => Str::slug($treat_name, '-'),
        'treat_desc' => $faker->sentence($nbWords = 10, $variableNbWords = true),
        'treat_price' => $faker->numberBetween($min = 10000, $max = 100000),
        'treat_image' => 'default.jpg'
    ];
});
