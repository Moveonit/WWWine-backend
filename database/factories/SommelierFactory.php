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

$factory->define(\App\Entities\Sommelier::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\it_IT\Address($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Person($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Company($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Internet($faker));
    $faker->addProvider(new Faker\Provider\it_IT\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Text($faker));


    return [
        'name'              => $faker->firstName,
        'surname'           => $faker->lastName,
        'city'              => $faker->state(),
        'province'          => $faker->stateAbbr(),
        'address'           => $faker->address,
        'country'           => "it",
        'gender'            => $faker->randomElement($array = array ('male', 'female')),
        'birthday'          => date("Y-m-d", strtotime($faker->date())),
        'phone'             => $faker->phoneNumber,
    ];
});
