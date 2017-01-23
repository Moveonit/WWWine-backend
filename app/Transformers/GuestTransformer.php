<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Guest;
use League\Fractal;

class GuestTransformer extends Fractal\TransformerAbstract
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
            'birthday'  => $guest->birthday,
            'gender'    => (string) $guest->gender,
        ];
    }
}