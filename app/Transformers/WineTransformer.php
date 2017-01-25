<?php

namespace App\Transformers;

use App\Entities\Wine;
use League\Fractal;

class WineTransformer extends Fractal\TransformerAbstract
{
    public function transform(Wine $wine)
    {
        return [
            'id'                    => (int)    $wine->id,
            'name'                  => (string) $wine->name,
            'production_year'       => (int)    $wine->production_year,
            'classification'        => (string) $wine->classification,
            'production_area'       => (string) $wine->production_area,
            'grapes_type'           => (string) $wine->grapes_type,
            'grapes_area'           => (string) $wine->grapes_area,
            'grapes_latitude'       => (float)  $wine->grapes_latitude,
            'grapes_longitude'      => (float)  $wine->grapes_longitude,
            'color'                 => (string) $wine->color,
            'fragrance'             => (string) $wine->fragrance,
            'taste'                 => (string) $wine->taste,
            'vinification'          => (string) $wine->vinification,
            'proof'                 => (string) $wine->proof,
            'service_temperature'   => (int)    $wine->service_temperature,
            'refiniment'            => (string) $wine->refiniment,
            'winery_id'             => (int)    $wine->winery_id
        ];
    }
}