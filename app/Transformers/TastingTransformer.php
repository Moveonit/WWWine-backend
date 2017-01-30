<?php

namespace App\Transformers;

use App\Entities\Beverage;
use Carbon\Carbon;
use League\Fractal;

class TastingTransformer extends Fractal\TransformerAbstract
{
    public function transform(Beverage $beverage)
    {
        return [
            'id'                    => (int)    $beverage->id,
            'name'                  => (string) $beverage->name,
            'production_year'       => (int)    $beverage->production_year,
            'classification'        => (string) $beverage->classification,
            'production_area'       => (string) $beverage->production_area,
            'grapes_type'           => (string) $beverage->grapes_type,
            'grapes_area'           => (string) $beverage->grapes_area,
            'grapes_latitude'       => (float)  $beverage->grapes_latitude,
            'grapes_longitude'      => (float)  $beverage->grapes_longitude,
            'color'                 => (string) $beverage->color,
            'fragrance'             => (string) $beverage->fragrance,
            'taste'                 => (string) $beverage->taste,
            'vinification'          => (string) $beverage->vinification,
            'proof'                 => (string) $beverage->proof,
            'service_temperature'   => (int)    $beverage->service_temperature,
            'refiniment'            => (string) $beverage->refiniment,
            'cellar_id'             => (int)    $beverage->cellar_id,
            'cellar'                => $beverage->cellar,
            'user_id'               => (int)    $beverage->user_id,
            'user'                  => $beverage->user,
            'created_at'            => (string) Carbon::parse($beverage->created_at),
            'updated_at'            => (string) Carbon::parse($beverage->updated_at),
            'deleted_at'            => (string) Carbon::parse($beverage->deleted_at)
        ];
    }
}