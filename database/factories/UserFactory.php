<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Entities\Student;
use App\Entities\User;
use App\Entities\UserDetail;
use App\School\Constants\RoleConstant;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'role_id' => $faker->randomElement([RoleConstant::STUDENT_ROLE_ID, RoleConstant::PARENT_ROLE_ID, RoleConstant::TEACHER_ROLE_ID, RoleConstant::ACCOUNTANT_ROLE_ID, RoleConstant::DRIVER_ROLE_ID]),
        'remember_token' => Str::random(10),
        'is_published' => true
    ];
});

$factory->afterCreating(User::class, function ($user) {
    $user->detail()->save(factory(UserDetail::class)->make());

    switch ($user->role_id) {
        case RoleConstant::STUDENT_ROLE_ID :
            $user->student()->save(factory(Student::class)->make());
            break;

        case RoleConstant::TEACHER_ROLE_ID :
            $user->teacher()->create();
            break;

        case RoleConstant::DRIVER_ROLE_ID :
            $user->driver()->create();
            break;

        case RoleConstant::PARENT_ROLE_ID :
            $user->guardian()->create();
            break;

        case RoleConstant::ACCOUNTANT_ROLE_ID :
            $user->accountant()->create();
            break;
    }
});

