<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sommelier
 * @property integer  id
 * @property string   name
 * @property string   surname
 * @property string   city
 * @property string   province
 * @property string   country
 * @property string   address
 * @property Carbon   birthday
 * @property string   gender
 * @property string   avatar
 * @property string   cover
 * @property string   phone
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Sommelier extends wwwModel
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'surname', 'city', 'address', 'birthday','country','province', 'gender', 'phone', 'avatar', 'cover'];

    protected $guarded = ['id'];

    public function user()
    {
        return $this->morphMany('User', 'userable');
    }
}
