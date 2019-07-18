<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class AdminJobController extends Controller
{
    public function index()
    {
        return view('admin.jobs.list', [
            'jobs' => Job::paginate(2)
        ]);
    }
}
