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
        return view('home.home', compact('categories','states'));
    }

    public function search()
    {
        $title = request('search_term');
        $job_type = request('job_type');
        $location = request('location');
        $jobs = Job::where('title', 'like', $title)
                   ->orWhere('job_type', '=', $job_type)
                   ->paginate(5);

        $jobs->withPath("?title={$title}&job_type={$job_type}&location={$location}");
        return view('home.search', compact('jobs'));
    }
}
