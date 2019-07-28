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

    private function rules()
    {
        return [
            'title'   => 'required',
            'content' => 'required'
        ];
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->rules());

        Page::create([
            'title'     => request('title'),
            'content'   => request('content'),
            'page_type' => 'static_page'
        ]);
        return redirect('/pages')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact("page"));
    }

    public function update(Page $page, Request $request)
    {
        $this->validate($request, $this->rules());
        $page->update($request->all());
        return redirect('/pages')->with('success', 'Page created successfully');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/pages')->with('success', 'Page deleted successfully.');
    }


}
