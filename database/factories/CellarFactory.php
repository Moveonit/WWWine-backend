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

$factory->define(\App\Entities\Cellar::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\it_IT\Address($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Person($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Company($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Internet($faker));
    $faker->addProvider(new Faker\Provider\it_IT\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Text($faker));

    return [

        'company_name'      => $faker->company,
        'city'              => $faker->state(),
        'avatar'            => "http://postscriptum-games.it/assets/post-scriptum-unknown-user-12b13115ab6cc8385c73c23f7c3e5465acfa1f8e7ef99568fcb464f0355561ef.png",
        'cover'              => "http://postscriptum-games.it/assets/post-scriptum-unknown-user-12b13115ab6cc8385c73c23f7c3e5465acfa1f8e7ef99568fcb464f0355561ef.png",
        'province'          => $faker->stateAbbr(),
        'address'           => $faker->address,
        'country'           => "it",
        'fiscal_code'       => $faker->taxId(),
        'VAT_number'        => $faker->vatId(),
        'latitude'          => $faker->latitude,
        'longitude'         => $faker->longitude,
        'phone'             => $faker->phoneNumber,
        'fax'               => $faker->phoneNumber
    ];
});
