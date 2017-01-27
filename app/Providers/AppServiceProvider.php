<?php

namespace App\Providers;

use App\Entities\Cellar;
use App\Entities\Guest;
use App\Entities\Restaurant;
use App\Entities\Sommelier;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Relation::morphMap([
            'Guest' => Guest::class,
            'Cellar' =>  Cellar::class,
            'Restaurant' =>  Restaurant::class,
            'Sommelier' =>  Sommelier::class,
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


}
