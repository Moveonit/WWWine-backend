<?php

namespace App\Transformers;

use App\Entities\Cellar;
use Carbon\Carbon;
use League\Fractal;

class CellarTransformer extends Fractal\TransformerAbstract
{
    public function transform(Cellar $cellar)
    {
        return [
            'id'                => (integer) $cellar->id,
            'company_name'      => (string) $cellar->company_name,
            'city'              => (string) $cellar->city,
            'province'          => (string) $cellar->province,
            'state'             => (string) $cellar->state,
            'address'           => (string) $cellar->address,
            'VAT_Number'        => (string) $cellar->VAT_Number,
            'fiscal_code'       => (string) $cellar->fiscal_code,
            'phone'             => (string) $cellar->phone,
            'fax'               => (string) $cellar->fax,
            'latitude'          => (float) $cellar->latitude,
            'longitude'         => (float) $cellar->longitude,
            'created_at'        => (string) Carbon::parse($cellar->created_at),
            'updated_at'        => (string) Carbon::parse($cellar->updated_at),
            'deleted_at'        => (string) Carbon::parse($cellar->deleted_at)
        ];
    }
}