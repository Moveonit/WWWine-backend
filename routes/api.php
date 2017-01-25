<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Http\Controllers\v1'], function ($api) {

        $api->get('refresh','Auth\JwtAuthenticateController@refresh');

        $api->post('signup','Auth\JwtAuthenticateController@signup');

        $api->post('login','Auth\JwtAuthenticateController@authenticate');

        $api->get('checkemail/{email}','UserController@checkemail');

        $api->group(['middleware' => 'jwt.auth'], function ($api) {

            $api->get('me', 'UserController@me');

            $api->resource('guests', 'GuestController',['only' => ['index', 'store', 'update']]);

            $api->resource('restaurants', 'RestaurantController',['only' => ['index', 'store', 'update']]);

            $api->resource('sommeliers', 'SommelierController',['only' => ['index', 'store', 'update']]);

            $api->resource('wineries', 'WineryController',['only' => ['index', 'store', 'update']]);

            $api->resource('wines', 'WineController',['only' => ['index', 'store', 'update']]);

            $api->post('changePassword','Auth\JwtAuthenticateController@changePassword');
        });
    });
});
