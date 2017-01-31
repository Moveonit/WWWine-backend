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

$factory->define(\App\Entities\Tasting::class, function (Faker\Generator $faker) {

    $faker->addProvider(new Faker\Provider\it_IT\Address($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Person($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Company($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Internet($faker));
    $faker->addProvider(new Faker\Provider\it_IT\PhoneNumber($faker));
    $faker->addProvider(new Faker\Provider\it_IT\Text($faker));
    $faker->addProvider(new Faker\Provider\Lorem($faker));

    $date_start  = $faker->dateTimeBetween('now','+1 years');
    $date_finish = date('Y-m-d H:i:s',strtotime('+2 hours',strtotime($date_start->format('Y-m-d H:i:s'))));

    return [
        'name'              => "Degustazione ".$faker->text(20),
        'avatar'            => "http://postscriptum-games.it/assets/post-scriptum-unknown-user-12b13115ab6cc8385c73c23f7c3e5465acfa1f8e7ef99568fcb464f0355561ef.png",
        'cover'             => "http://postscriptum-games.it/assets/post-scriptum-unknown-user-12b13115ab6cc8385c73c23f7c3e5465acfa1f8e7ef99568fcb464f0355561ef.png",
        'description'       => $faker->text(255),
        'longitude'         => $faker->longitude,
        'latitude'          => $faker->latitude,
        'location_name'     => $faker->city,
        'annulment_time'    => $faker->biasedNumberBetween(1,20),
        'price'             => $faker->randomFloat(2,1,200),
        'min_participants'  => $faker->biasedNumberBetween(1,10),
        'max_participants'  => $faker->biasedNumberBetween(11,30),
        'privacy'           => $faker->randomElement($array = array ('private','public')),
        'resell'            => $faker->boolean,
        'hostable_type'     => $faker->randomElement($array = array ('Restaurant','Cellar', 'Event')),
        'hostable_id'       => $faker->biasedNumberBetween(1,50),
        'date_start'        => $date_start,
        'date_finish'       => $date_finish,
        'user_id'           => $faker->biasedNumberBetween(1,200),
        'created_at'        => $faker->dateTime,
        'updated_at'        => $faker->dateTime
    ];
});
