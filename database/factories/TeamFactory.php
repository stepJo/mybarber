<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'tm_name' => $faker->name,
        'tm_job' => $faker->jobTitle,
        'tm_profile' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'tm_image' => 'default.jpg'
    ];
});
