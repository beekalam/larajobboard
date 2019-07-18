<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function Pending()
    {
        return $this->jobs('pending');
    }

    public function Approved()
    {
        return $this->jobs('approved');
    }

    public function Blocked()
    {
        return $this->jobs('blocked');
    }

    public function Jobs($type)
    {
        $types = [
            'pending'  => 0,
            'approved' => 1,
            'blocked'  => 2
        ];
        return view('admin.jobs.list', [
            'jobs' => Job::where('status', $types[$type])->paginate(10)
        ]);
    }

    /**
     * @param Job $job
     */
    public function Approve(Job $job)
    {
        $job->update(['status' => 1]);
        return redirect('admin/jobs/approved')->with('success', 'Successfully approved.');
    }

    public function Block(Job $job)
    {
        $job->update(['status' => 2]);
        return redirect('admin/jobs/blocked')->with('success', 'Successfully blocked.');
    }
}
