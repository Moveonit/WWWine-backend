<?php
/**
 * Created by PhpStorm.
 * User: DANIELE
 * Date: 12/10/2016
 * Time: 09:01
 */

namespace App\Transformers;

use App\Entities\Guest;
use App\Entities\Winery;
use Carbon\Carbon;
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