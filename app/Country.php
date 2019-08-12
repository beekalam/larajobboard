<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Country extends Model
{
    public $timestamps = false;
    public function states()
    {
        return $this->hasMany(State::class);
    }

    public static function getAllCountries()
    {
        return Cache::remember('countries', now()->addMinute(2), function () {
            return Country::all();
        });
    }
}
