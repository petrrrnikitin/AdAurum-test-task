<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$types = ['title', 'tax_id_number', 'description', 'owner', 'address', 'phone', 'company'];

$factory->define(Comment::class, function (Faker $faker) use ($types) {
    return [
        'comment' => $faker->sentence($faker->numberBetween(2, 10)),
        'type' => $types[$faker->numberBetween(0,6)]
    ];
});
