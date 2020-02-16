<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\TreatmentType;
use Faker\Generator as Faker;

$factory->define(TreatmentType::class, function (Faker $faker) {
    return [
        'treat_type_name' => $faker->word,
    ];
});
