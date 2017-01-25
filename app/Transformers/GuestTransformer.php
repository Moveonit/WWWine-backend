<?php
namespace App\Transformers;

use App\Entities\Guest;
use Carbon\Carbon;
use League\Fractal;

class GuestTransformer extends Fractal\TransformerAbstract
{
    public function transform(Guest $guest)
    {
        return [
            'id'        => (integer)    $guest->id,
            'name'      => (string)     $guest->name,
            'surname'   => (string)     $guest->surname,
            'city'      => (string)     $guest->city,
            'province'  => (string)     $guest->province,
            'address'   => (string)     $guest->address,
            'state'     => (string)     $guest->state,
            'birthday'  => (string)     Carbon::parse($guest->birthday),
            'gender'    => (string)     $guest->gender,
        ];
    }
}