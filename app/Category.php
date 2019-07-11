<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
