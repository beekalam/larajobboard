<?php

namespace App\Http\Controllers;

use App\Job;
use App\JobApplication;
use Illuminate\Http\Request;
use App\Rules\ResumeRule;
use Auth;

class JobApplyController extends Controller
{
    public function show(Job $job)
    {
        return view('jobs.apply', compact("job"));
    }

    public function apply(Request $request,Job $job)
    {
        $fields = $request->validate([
            'name'         => 'required',
            'email'        => 'required',
            'phone_number' => 'required',
            'resume'       =>  ['required', new ResumeRule],
        ]);
        
        try{
            $fields['user_id']  = Auth::check() ? auth()->id() : 0;
            $fields['resume'] = $request->resume->store('resume','public');
            $fields['job_id'] = $job->id;
            $fields['employer_id'] =$job->user_id;
            $fields['message'] = $request->message;
            JobApplication::create($fields);
        }catch(\Exception $e){
            return back()->withInput($request->input())->with('error',$e->getMessage());
        }

        return back()->with('success', 'Your resume has been received.');
    }
}
