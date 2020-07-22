<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Student;
use App\Entities\StudentDetail;
use App\Services\General\SectionService;
use Faker\Generator as Faker;


$factory->define(Student::class, function (Faker $faker) {
    return [
        'section_id' => $faker->numberBetween(1,24)
    ];
});

$factory->afterCreating(Student::class, function ($student) {
    $student->detail()->save(factory(StudentDetail::class)->make());
});
