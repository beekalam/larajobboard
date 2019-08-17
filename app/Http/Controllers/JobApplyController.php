<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use App\Rules\ResumeRule;
use Auth;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    public function show(Job $job)
    {
        return view('jobs.apply', [
            'job' => $job,
        ]);
    }

    public function apply(Request $request, Job $job)
    {
        $fields = $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'resume'       => ['required', new ResumeRule],
        ]);

        try {
            $fields['user_id'] = auth()->id() ?? 0;
            $fields['resume'] = $request->resume->store('resume', 'public');
            $fields['job_id'] = $job->id;
            $fields['employer_id'] = $job->user_id;
            $fields['message'] = $request->message;
            JobApplication::create($fields);
        } catch (\Exception $e) {
            return back()->withInput($request->input())->with('error', $e->getMessage());
        }

        // return back()->with('success', 'Your resume has been received.');
        return view('job_apply.index')
            ->with('success','Your resume has been submitted. The employer will be in contact with you.');
    }

}
