<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tasting
 * @property integer  id
 * @property string   name
 * @property string   avatar
 * @property string   cover
 * @property string   description
 * @property float    longitude
 * @property float    latitude
 * @property string   location_name
 * @property integer  annulment_time
 * @property float    price
 * @property integer  min_participants
 * @property integer  max_participants
 * @property string   privacy
 * @property string   resell
 * @property string   hostable_type
 * @property integer  hostable_id
 * @property Carbon   date_start
 * @property Carbon   date_finish
 * @property integer  user_id
 * @property User     user
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Tasting extends wwwModel
{
    //
    use SoftDeletes;

    protected $fillable = [
        'name',
        'avatar',
        'cover',
        'description',
        'longitude',
        'latitude',
        'location_name',
        'annulment_time',
        'price',
        'min_participants',
        'max_participants',
        'privacy',
        'resell',
        'hostable_type',
        'hostable_id',
        'date_start',
        'date_finish',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    protected $guarded = ['id'];


    /**
     * Get the user record associated.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function hostable()
    {
        return $this->morphTo();
    }

    public function beverages()
    {
        return $this->belongsToMany(Beverage::class);
    }
}
