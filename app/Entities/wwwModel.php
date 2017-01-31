<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class wwwModel extends Model
{
    //Filter ?filter=name:like:%Maria%;production_year:>:1987
    public function scopeFilter($query, $filters)
    {
        $filters = $filters->get('filter');
        if ($filters) {
            foreach (explode(";", $filters) as &$filter) {
                $filter = explode(":", $filter);

                $query = $query->where($filter[0], $filter[1], $filter[2]);
            }

            return $query;
        }
    }

}