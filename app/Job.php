<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $guarded = [];
    protected $casts = [
        'deadline' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getTypeAttribute()
    {
        return ucfirst(str_replace('_', ' ', $this->job_type));
    }

    public function getLocationAttribute()
    {
        return $this->country_name . ", " . $this->state_name . ", " . ucfirst($this->city_name);
    }

    public function getMinMaxSalaryAttribute()
    {
        return sprintf("%s %s - %s %s", $this->currency, $this->salary, $this->currency, $this->salary_max);
    }

    public static function filter($params)
    {
        $jobs = Job::latest();
        if (isset($params['job_type']) && !empty($params['job_type'])) {
            $jobs = $jobs->orWhere('job_type', '=', $params['job_type']);
        }
        if(isset($params['title']) && !empty($params['title'])){
            $jobs = $jobs->orWhere('title','like',$params['title']);
        }

        if(isset($params['state_name']) && !empty($params['state_name'])){
            $jobs = $jobs->orWhere('state_name','like',$params['state_name']);
        }

        return $jobs;
    }

}