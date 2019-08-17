<?php

namespace App\Http\Controllers;

use App\Page;

class StaticPageController extends Controller
{
    public function show(Page $page)
    {
        return view('static_pages.index', compact('page'));
    }
}
