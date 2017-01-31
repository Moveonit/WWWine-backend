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
        $user = $event->user;
        return [
            'id'                    => (int)    $event->id,
            'name'                  => (string) $event->name,
            'avatar'                => (string) $event->avatar,
            'cover'                 => (string) $event->cover,
            'description'           => (string) $event->description,
            'longitude'             => (float)  $event->longitude,
            'latitude'              => (float)  $event->latitude,
            'date_start'            => (string) Carbon::parse($event->date_start),
            'date_finish'           => (string) Carbon::parse($event->date_finish),
            $user->userable_type    =>          $user->userable,
            'created_at'            => (string) Carbon::parse($event->created_at),
            'updated_at'            => (string) Carbon::parse($event->updated_at)
        ];
    }
}