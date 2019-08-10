<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use Illuminate\Http\Request;
use App\Rules\ResumeRule;

class JobApplyController extends Controller
{
    public function show(Job $job)
    {
        return view('jobs.apply', compact("job"));
    }

    public function apply(Request $request, $job)
    {
        $ret = $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'resume'       =>  ['required', new ResumeRule]
        ]);
        $ret['user_id']  = auth()->id();
        JobApplication::create($ret);
          
        return back()->with('success', 'Your resume has been received.');
    }
}
