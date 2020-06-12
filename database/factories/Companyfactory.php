<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use Faker\Generator as Faker;



$factory->define(Company::class, function (Faker $faker) {
    return [
        'title' => $faker->company . ' ' . $faker->companySuffix,
        'tax_id_number' => $faker->numberBetween(100000000, 999999999 ) . $faker->numberBetween(0,9),
        'description' => $faker->sentence(6),
        'owner' => $faker->lastName . ' ' . $faker->firstName,
        'address' => $faker->city . ', ' . $faker->streetSuffix . ' ' . $faker->streetName . ' ' .  $faker->buildingNumber,
        'phone' => $faker->phoneNumber,
        'user_id' => User::find(random_int(1,User::all()->count()))->id,
    ];
});
