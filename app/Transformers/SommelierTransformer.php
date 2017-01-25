<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Guest;
use Carbon\Carbon;
use League\Fractal;

class RestaurantTransformer extends Fractal\TransformerAbstract
{
    public function transform(Guest $guest)
    {
        return [
            'id'        => (integer) $guest->id,
            'name'      => (string) $guest->name,
            'surname'   => (string) $guest->surname,
            'city'      => (string) $guest->city,
            'province'  => (string) $guest->province,
            'address'   => (string) $guest->address,
            'birthday'  => (string) Carbon::parse($guest->birthday),
            'gender'    => (string) $guest->gender,
        ];
    }
}