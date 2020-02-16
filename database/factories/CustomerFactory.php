<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'cust_name' => $faker->name,
        'cust_email' => $faker->unique()->email,
        'cust_phone' => $faker->phoneNumber
    ];
});
