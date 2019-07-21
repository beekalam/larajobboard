<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Job;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function favorite(Job $job)
    {
        $job->favorite();
    }

    public function unfavorite(Job $job)
    {
        $job->unfavorite();
    }
}
