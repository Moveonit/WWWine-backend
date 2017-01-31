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

$factory->define(\App\Entities\Beverage::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\it_IT\Address($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Person($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Company($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Internet($faker));
    $faker->addProvider(new Faker\Provider\it_IT\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Text($faker));

    return [
        'name'                  => "Vino di ".$faker->firstNameFemale,
        'production_year'       => $faker->year,
        'classification'        => "Classificazione",
        'production_area'       => $faker->city,
        'type'                  => $faker->randomElement($array = array ('wine', 'beer')),
        'grapes_type'           => "Tipo uva",
        'grapes_area'           => $faker->city,
        'grapes_latitude'       => $faker->latitude,
        'grapes_longitude'      => $faker->longitude,
        'color'                 => $faker->colorName,
        'fragrance'             => "fragranza",
        'taste'                 => "sapore",
        'vinification'          => "vinificazione",
        'alcohol'               => $faker->randomFloat(1,0,99),
        'service_temperature'   => $faker->biasedNumberBetween(10,30),
        'refiniment'            => "raffinatezza",
        'cellar_id'             => $faker->biasedNumberBetween(1,50),
        'user_id'               => $faker->biasedNumberBetween(1,200),
        'created_at'            => $faker->dateTime,
        'updated_at'            => $faker->dateTime
    ];
});
