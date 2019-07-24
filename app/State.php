<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class State extends Model
{
    public $timestamps = false;

    public static function getAllStates()
    {
        return Cache::remember('states', now()->addMinute(2), function () {
            return State::all();
        });
    }
}
