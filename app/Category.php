<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Category extends Model
{
    protected $guarded = [];
    protected $appends = ['jobsCount'];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function getJobsCountAttribute()
    {
        return $this->jobs->count();
    }

    public static function getAllCategories()
    {
        return Cache::remember('all_categories', now()->addMinute(2), function () {
            return Category::all();
        });
    }
}
