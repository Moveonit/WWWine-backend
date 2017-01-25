<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cellar
 * @property integer  id
 * @property string   company name
 * @property string   city
 * @property string   province
 * @property string   state
 * @property string   address
 * @property string   VAT_Number
 * @property string   fiscal_code
 * @property string   phone
 * @property string   fax
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Cellar extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['name', 'surname', 'city', 'address', 'birthday','state','province', 'gender'];

    protected $guarded = ['id'];
}
