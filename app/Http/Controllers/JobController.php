<?php

namespace App\Http\Controllers;

use App\Category;
use App\Country;
use App\Http\Requests\JobRequest;
use App\Job;

class JobController extends Controller
{

    /**
     * JobController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

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
        $this->authorize('create', new Job());

        return view('admin.jobs.create', [
            'categories' => category::all(),
            'job'        => new Job(),
            'countries'  => Country::all()
        ]);

    }

    public function store(JobRequest $request)
    {
        $this->authorize('create', new Job());
        Job::create([
            'user_id'                   => auth()->id(),
            'title'                     => request('title'),
            'slug'                      => str_slug(request('title')),
            'position'                  => request('position'),
            'category_id'               => request('category'),
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
            'status'                    => 0,
            'anywhere_location'         => is_null(request('anywhere_location')) ? 0 : 1,
        ]);

        return redirect('/posted')->with('success', 'Job created successfully.');
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);
        return view('admin.jobs.edit', [
            'categories' => category::all(),
            'job'        => $job,
            'countries'  => Country::all()
        ]);
    }

    public function update(Job $job)
    {
        $this->authorize('update', $job);

        $data = request()->all();
        $data['category_id'] = $data['category'];
        $data['country_id'] = $data['country'];
        $data['state_id'] = $data['state'];
        unset($data['category']);
        unset($data['country']);
        unset($data['state']);
        $job->update($data);
        return redirect('/posted')->with('success','Job successfully updated.');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);
        $job->delete();
        return redirect("/posted")->with('success','Job successfully deleted.');
    }

    public function posted()
    {
        if (auth()->user()->isAdmin()) {
            $jobs = Job::where('user_id')->paginate(10);
        } elseif (auth()->user()->isEmployer()) {
            $jobs = Job::where('user_id', auth()->id())->paginate(10);
        }

        return view("admin.jobs.posted", [
            'jobs' => Job::where('user_id', auth()->id())->paginate(10)
        ]);
    }

}
