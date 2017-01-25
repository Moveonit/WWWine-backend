<?php

namespace App\Transformers;

use App\Entities\Winery;
use League\Fractal;

class WineryTransformer extends Fractal\TransformerAbstract
{
    public function transform(Winery $winery)
    {
        return [
            'id'                => (integer) $winery->id,
            'company_name'      => (string) $winery->company_name,
            'city'              => (string) $winery->city,
            'province'          => (string) $winery->province,
            'state'             => (string) $winery->state,
            'address'           => (string) $winery->address,
            'VAT_Number'        => (string) $winery->VAT_Number,
            'fiscal_code'       => (string) $winery->fiscal_code,
            'phone'             => (string) $winery->phone,
            'fax'               => (string) $winery->fax,
            'latitude'          => (float) $winery->latitude,
            'longitude'         => (float) $winery->longitude
        ];
    }
}