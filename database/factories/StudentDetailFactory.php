<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\StudentDetail;
use Faker\Generator as Faker;

$factory->define(StudentDetail::class, function (Faker $faker) {
    return [
        'roll' => $faker->unique()->numberBetween(1,999),
        'prev_school' => $faker->text,
        'year_started' => $faker->date('Y')
    ];
});
