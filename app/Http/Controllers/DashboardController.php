<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use App\User;

class DashboardController extends Controller
{

    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('admin.dashboard', [
            'applied'        => JobApplication::count(),
            'employer_count' => User::EmployerCount(),
            'total_jobs'     => Job::Approved()->count(),
            // 'active_jobs' => Job::Active()->count
            'active_jobs'    => 0
        ]);
    }

}
