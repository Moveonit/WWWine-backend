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
 * @property string   state
 * @property string   address
 * @property Carbon   birthday
 * @property string   gender
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Sommelier extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'surname', 'city', 'address', 'birthday','state','province', 'gender'];

    protected $guarded = ['id'];
}
