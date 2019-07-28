<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.pages.index', [
            'pages' => Page::staticPages()->paginate()
        ]);
    }

    public function create()
    {
        return view('admin.pages.create', [
            'page' => new Page()
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'   => 'required',
            'content' => 'required'
        ]);

        Page::create([
            'title'     => request('title'),
            'content'   => request('content'),
            'page_type' => 'static_page'
        ]);
        return redirect('/pages')->with('success', 'Page created successfully.');
    }
}
