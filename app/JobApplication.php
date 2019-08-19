<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $guarded = [];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function employer()
    {
       return $this->belongsTo(User::class,'employer_id','id');
    }

    public function applicant()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

}
