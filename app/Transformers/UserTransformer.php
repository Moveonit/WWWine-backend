<?php

namespace App\Transformers;

use App\Entities\User;
use Carbon\Carbon;
use League\Fractal;

class UserTransformer extends Fractal\TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'                    => (integer) $user->id,
            'email'                 => (string) $user->email,
            'activated'             => (bool) $user->activated,
            'type'                  => (string) $user->userable_type,
            $user->userable_type    => $user->userable,
            'created_at'            => (string) Carbon::parse($user->created_at),
            'updated_at'            => (string) Carbon::parse($user->updated_at),
            'deleted_at'            => (string) Carbon::parse($user->deleted_at)
        ];
    }
}