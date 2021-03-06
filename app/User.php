<?php

namespace App;

use function foo\func;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'country_id',
        'country_name',
        'state_id',
        'state_name',
        'city',
        'gender',
        'address',
        'address_2',
        'phone',
        'user_type',
        'company',
        'company_slug',
        'company_size',
        'about_company',
        'logo',
        'website',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }


    public static function userCount()
    {
        return Cache::remember('employer_count', config('app.ttl'), function () {
            return User::where('user_type', 'user')->count();
        });
    }

    public static function employerCount()
    {
        return Cache::remember('user_count', config('app.ttl'), function () {
            return User::where('user_type', 'employer')->count();
        });
    }

    public function isAdmin()
    {
        return $this->user_type == 'admin';
    }

    public function isEmployer()
    {
        return $this->user_type == 'employer';
    }

    public function isUser()
    {
        return $this->user_type == 'user';
    }

    public function favoritedJobs()
    {
         $job_ids = Favorite::where('user_id', auth()->id())->pluck('favorited_id');
         return Job::whereIn('id',$job_ids)->get();
    }

    public function appliedJobs()
    {
       return $this->hasMany(JobApplication::class);
    }

}
