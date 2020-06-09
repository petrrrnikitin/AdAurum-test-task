<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;



$factory->define(Company::class, function (Faker $faker) {
    return [
        'title' => $faker->company . ' ' . $faker->companySuffix,
        'tax_id_number' => $faker->numberBetween(100000000, 999999999 ) . $faker->numberBetween(0,9),
        'description' => $faker->sentence(6),
        'owner' => $faker->lastName . ' ' . $faker->firstName,
        'address' => $faker->address,
        'phone' => $faker->phoneNumber
    ];
});
