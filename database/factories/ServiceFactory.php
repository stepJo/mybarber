<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Service;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Service::class, function (Faker $faker) {
	$serv_name = $faker->word;
    return [
        'serv_name' => $serv_name,
        'serv_name_slug' => Str::slug($serv_name, '-'),
        'serv_desc' => $faker->sentence($nbWords = 20, $variableNbWords = true),
        'serv_image' => 'default.jpg'	
    ];
});
