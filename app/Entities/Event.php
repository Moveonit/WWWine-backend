<?php

namespace App\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Event
 * @property integer  id
 * @property string   name
 * @property string   avatar
 * @property string   cover
 * @property string   description
 * @property float    longitude
 * @property float    latitude
 * @property Carbon   date_start
 * @property Carbon   date_finish
 * @property integer  user_id
 * @property User     user
 * @property Carbon   created_at
 * @property Carbon   updated_at
 * @property Carbon   deleted_at
 */
class Event extends Model
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
        'date_start',
        'date_finish',
        'user_id'
    ];

    protected $guarded = ['id'];

    /**
     * Get the user record associated.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
