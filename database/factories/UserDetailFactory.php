<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\UserDetail;
use Faker\Generator as Faker;

$factory->define(UserDetail::class, function (Faker $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'dob' => $faker->dateTime,
        'image' => $faker->imageUrl(300,100),
    ];
});
