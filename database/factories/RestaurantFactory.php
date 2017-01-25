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
        'company_name'      => $faker->company,
        'city'              => $faker->city,
        'province'          => $faker->citySuffix,
        'state'             => $faker->country,
        'address'           => $faker->address,
        'fiscal_code'       => Faker\Provider\it_IT\Person::taxId(),
        'VAT_number'        => Faker\Provider\fr_BE\Payment::vat(false),
        'latitude'          => $faker->latitude,
        'longitude'         => $faker->longitude,
        'phone'             => $faker->phoneNumber,
        'fax'               => $faker->phoneNumber
    ];
});
