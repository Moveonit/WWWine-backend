<?php
namespace App\Transformers;

use App\Entities\Restaurant;
use League\Fractal;

class RestaurantTransformer extends Fractal\TransformerAbstract
{
    public function transform(Restaurant $restaurant)
    {
        return [
            'id'                => (integer)    $restaurant->id,
            'company_name'      => (string)     $restaurant->company_name,
            'city'              => (string)     $restaurant->city,
            'province'          => (string)     $restaurant->province,
            'state'             => (string)     $restaurant->state,
            'address'           => (string)     $restaurant->address,
            'VAT_Number'        => (string)     $restaurant->VAT_Number,
            'fiscal_code'       => (string)     $restaurant->fiscal_code,
            'latitude'          => (float)      $restaurant->latitude,
            'longitude'         => (float)      $restaurant->longitude,
            'phone'             => (string)     $restaurant->phone,
            'fax'               => (string)     $restaurant->fax
        ];
    }
}