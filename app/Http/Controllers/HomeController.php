<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Job;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->only('favorites');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home.home', [
            'categories' => Category::getAllCategories(),
            // 'states'         => State::getAllStates(),
            'countries' => Country::getAllCountries(),
            'user_count' => User::userCount(),
            'employer_count' => User::employerCount(),
            'posted_jobs' => Job::PostedJobs(),
        ]);
    }

    public function search()
    {
        $title = request('search_term');
        $job_type = request('job_type');
        $state_name = request('location');
        $country_name = request('location');
        $jobs = Job::filter(compact('title', 'job_type', 'country_name'))->paginate(5);

        $jobs->withPath("?title={$title}&job_type={$job_type}&location={$state_name}");
        return view('home.search', [
            'jobs' => $jobs,
            'search_term' => $title,
        ]);
    }

    public function register()
    {
        return view('home.select_register');
    }

    public function favorites()
    {
        return view('home.favorites');
    }

}
