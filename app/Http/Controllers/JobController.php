<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::all();
        return view('jobs.index', compact('jobs'));
    }

    /**
     * @param Job $Job
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Job $Job)
    {
        return view('jobs.show', ['job' => $Job]);
    }

    public function create()
    {
        $job = new Job();
        $categories = Category::all();
        return view('admin.jobs.create',compact('job','categories'));
    }

    public function store()
    {
        Job::create([
            'user_id'                   => auth()->id(),
            'title'                     => request('title'),
            'slug'                      => str_slug(request('title')),
            'position'                  => request('position'),
            'category_id'               => request('category_id'),
            'salary'                    => request('salary'),
            'salary_max'                => request('salary_max'),
            'cycle'                     => request('cycle'),
            'currency'                  => request('currency'),
            'gender'                    => request('gender'),
            'job_type'                  => request('job_type'),
            'experience_level'          => request('experience_level'),
            'description'               => request('description'),
            'skills'                    => request('skills'),
            'responsibilities'          => request('responsibilities'),
            'educational_requirements'  => request('educational_requirements'),
            'experience_requirements'   => request('experience_requirements'),
            'additional_requirements'   => request('additional_requirements'),
            'benefits'                  => request('benefits'),
            'apply_instructions'        => request('apply_instructions'),
            'country_id'                => request('country_id'),
            'country_name'              => 'todo',
            'state_id'                  => request('state_id'),
            'state_name'                => 'todo',
            'city_name'                 => 'todo',
            'experience_required_years' => request('experience_required_years'),
            'deadline'                  => date('Y-m-d H:i:s', time()),
            'status'                    => 0
        ]);
        return redirect('/jobs');
    }


}
