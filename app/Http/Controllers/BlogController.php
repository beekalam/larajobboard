<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('admin.blog.index',[
            'posts' => Page::where('page_type','blog_post')->orderBy('created_at','desc')->paginate(10)
        ]);
    }
}
