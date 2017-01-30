<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Beverage
 * @property integer  id
 * @property string   name
 * @property string   classification
 * @property string   production_area
 * @property int      production_year
 * @property string   grapes_type
 * @property string   grapes_area
 * @property string   color
 * @property string   fragrance
 * @property string   taste
 * @property string   vinification
 * @property float    proof
 * @property float    grapes_longitude
 * @property float    grapes_latitude
 * @property int      service_temperature
 * @property string   refiniment
 * @property int      cellar_id
 * @property Cellar   cellar
 * @property int      user_id
 * @property User     user
 * @property bool     verified
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Beverage extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'classification',
        'production_area',
        'production_year',
        'grapes_type',
        'grapes_area',
        'user_id',
        'color',
        'fragrance',
        'taste',
        'vinification',
        'proof',
        'service_temperature',
        'refiniment',
        'cellar_id',
        'user_id',
        'verified'
    ];

    protected $guarded = ['id'];

    public function cellar()
    {
        return $this->hasOne(Cellar::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
