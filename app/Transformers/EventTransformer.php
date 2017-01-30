<?php

namespace App\Transformers;

use App\Entities\Beverage;
use App\Entities\Event;
use Carbon\Carbon;
use League\Fractal;

class EventTransformer extends Fractal\TransformerAbstract
{
    public function transform(Event $event)
    {
        return [
            'id'            => (int)    $event->id,
            'name'          => (int)    $event->name,
            'avatar'        => (string) $event->avatar,
            'cover'         => (int)    $event->cover,
            'description'   => (string) $event->description,
            'longitude'     => (string) $event->longitude,
            'latitude'      => (string) $event->latitude,
            'date_start'    => (string) $event->date_start,
            'date_finish'   => (float)  $event->date_finish,
            'user_id'       => (float)  $event->user_id,
            'created_at'    => (string) Carbon::parse($event->created_at),
            'updated_at'    => (string) Carbon::parse($event->updated_at),
            'deleted_at'    => (string) Carbon::parse($event->deleted_at)
        ];
    }
}