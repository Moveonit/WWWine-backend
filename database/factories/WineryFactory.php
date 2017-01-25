<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(\App\Entities\Restaurant::class, function (Faker\Generator $faker) {

    return [
        'name'              => $faker->firstName,
        'surname'           => $faker->lastName,
        'city'              => $faker->city,
        'province'          => $faker->citySuffix,
        'address'           => $faker->address,
        'state'             => $faker->country,
        'gender'            => $faker->randomElement($array = array ('male', 'female')),
        'birthday'          => $faker->date(),
        'phone'             => $faker->phoneNumber,
    ];
});
