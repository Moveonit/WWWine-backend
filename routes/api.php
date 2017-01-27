<?php

$api = app('Dingo\Api\Routing\Router');

$api->version('v1', function ($api) {

    $api->group(['namespace' => 'App\Http\Controllers\v1'], function ($api) {

        $api->get('refresh','Auth\JwtAuthenticateController@refresh');

        $api->post('signup','Auth\JwtAuthenticateController@signup');

        $api->post('login','Auth\JwtAuthenticateController@authenticate');

        $api->get('checkemail/{email}','UserController@checkemail');

        $api->get('send','Auth\JwtAuthenticateController@sendMail');

        $api->get('user/activation/{token}', 'Auth\JwtAuthenticateController@activateUser');

        $api->get('user/remove/{token}', 'Auth\JwtAuthenticateController@removeUser');

        $api->group(['middleware' => 'jwt.auth'], function ($api) {

            $api->get('me', 'UserController@me');

            $api->resource('guests', 'GuestController',['only' => ['index', 'show', 'store', 'update', 'destroy']]);

            $api->resource('restaurants', 'RestaurantController',['only' => ['index', 'show', 'store', 'update', 'destroy']]);

            $api->resource('sommeliers', 'SommelierController',['only' => ['index', 'show', 'store', 'update', 'destroy']]);

            $api->resource('cellars', 'CellarController',['only' => ['index', 'show', 'store', 'update', 'destroy']]);

            $api->resource('beverages', 'BeverageController',['only' => ['index', 'show', 'store', 'update', 'destroy']]);

            $api->post('changePassword','Auth\JwtAuthenticateController@changePassword');

        });
    });
});
