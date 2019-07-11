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
        return sprintf("%s %s - %s %s",$this->currency, $this->salary, $this->currency, $this->salary_max);
    }
}
