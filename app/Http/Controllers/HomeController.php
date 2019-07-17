<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use App\State;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();
        $states = State::all();
        return view('home.home', compact('categories', 'states'));
    }

    public function search()
    {
        $title = request('search_term');
        $job_type = request('job_type');
        $state_name = request('location');
        $jobs = Job::filter(compact('title', 'job_type', 'state_name'))->paginate(5);

        $jobs->withPath("?title={$title}&job_type={$job_type}&location={$state_name}");
        return view('home.search', compact('jobs'));
    }

    public function register()
    {
        return view('home.select_register');
    }

}
