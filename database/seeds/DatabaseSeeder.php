<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        /*
        factory(\App\Entities\Guest::class, 50)->create()->each(function ($u) {
            $u->user()->save(factory(\App\Entities\User::class)->make());
        });
        factory(\App\Entities\Restaurant::class, 50)->create()->each(function ($u) {
            $u->user()->save(factory(\App\Entities\User::class)->make());
        });
        factory(\App\Entities\Cellar::class, 50)->create()->each(function ($u) {
            $u->user()->save(factory(\App\Entities\User::class)->make());
        });
        factory(\App\Entities\Sommelier::class, 50)->create()->each(function ($u) {
            $u->user()->save(factory(\App\Entities\User::class)->make());
        });

        factory(\App\Entities\Beverage::class, 200)->create();
        */

        factory(\App\Entities\Event::class, 50)->create();

        factory(\App\Entities\Tasting::class, 300)->create()->each(function ($u) {
            for ($i = 0 ; $i < 10 ; $i++){
                $u->beverages()->attach(random_int(1,200));
            }
        });


    }
}
