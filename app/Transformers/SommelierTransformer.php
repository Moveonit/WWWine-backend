<?php

namespace App\Transformers;

use App\Entities\Sommelier;
use Carbon\Carbon;
use League\Fractal;

class SommelierTransformer extends Fractal\TransformerAbstract
{
    public function transform(Sommelier $sommelier)
    {
        return [
            'id'        => (integer)    $sommelier->id,
            'name'      => (string)     $sommelier->name,
            'surname'   => (string)     $sommelier->surname,
            'city'      => (string)     $sommelier->city,
            'province'  => (string)     $sommelier->province,
            'address'   => (string)     $sommelier->address,
            'state'     => (string)     $sommelier->state,
            'birthday'  => (string)     Carbon::parse($sommelier->birthday),
            'gender'    => (string)     $sommelier->gender,
        ];
    }
}