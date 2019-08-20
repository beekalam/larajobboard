<?php

namespace App\Http\Controllers;

use App\JobApplication;

class JobApplicantController extends Controller
{

    /**
     * JobApplicantController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.applicants.index', [
            'applications' => JobApplication::where('employer_id', auth()->id())->paginate(10),
        ]);
    }

    public function applied()
    {
        return view('admin.applicants.applied',[
            'applied_jobs' => auth()->user()->appliedJobs()->latest()->paginate(10),
        ]);
    }
}
