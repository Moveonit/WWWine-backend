<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cellar
 * @property integer  id
 * @property string   company_name
 * @property string   city
 * @property string   province
 * @property string   country
 * @property string   address
 * @property string   VAT_Number
 * @property string   fiscal_code
 * @property string   phone
 * @property string   avatar
 * @property string   cover
 * @property string   fax
 * @property float    latitude
 * @property float    longitude
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Cellar extends wwwModel
{
    //
    use SoftDeletes;

    protected $fillable = ['company_name', 'city', 'province', 'country', 'address','VAT_Number','fiscal_code','avatar', 'cover', 'phone', 'fax', 'latitude', 'longitude'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->morphMany('User', 'userable');
    }
}
