<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', new Page());
        return view('admin.pages.index', [
            'pages' => Page::staticPages()->paginate()
        ]);
    }

    public function create()
    {
        $this->authorize('create', new Page());
        return view('admin.pages.create', [
            'page' => new Page()
        ]);
    }

    private function rules()
    {
        return [
            'title'               => 'required',
            'content'             => 'required',
            'show_in_footer_menu' => 'nullable',
            'show_in_header_menu' => 'nullable'
        ];
    }

    public function store(Request $request)
    {
        $this->authorize('create', new Page());
        $this->validate($request, $this->rules());

        Page::create([
            'title'               => request('title'),
            'content'             => request('content'),
            'page_type'           => 'static_page',
            'show_in_footer_menu' => is_null(request('show_in_footer_menu')) ? 0 : 1,
            'show_in_header_menu' => is_null(request('show_in_header_menu')) ? 0 : 1
        ]);
        return redirect('/pages')->with('success', 'Page created successfully.');
    }

    public function edit(Page $page)
    {
        $this->authorize('update', $page);
        return view('admin.pages.edit', compact("page"));
    }

    public function update(Page $page, Request $request)
    {
        $this->authorize('update', $page);
        $fields = $this->validate($request, $this->rules());
        $fields['show_in_header_menu'] = $fields['show_in_header_menu'] == 'on' ? 1 : 0;
        $fields['show_in_footer_menu'] = $fields['show_in_footer_menu'] == 'on' ? 1 : 0;
        $page->update($fields);
        return redirect('/pages')->with('success', 'Page created successfully');
    }

    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);
        $page->delete();
        return redirect('/pages')->with('success', 'Page deleted successfully.');
    }

}
