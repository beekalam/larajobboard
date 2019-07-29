<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.blog.index',[
            'posts' => Page::where('page_type','blog_post')->orderBy('created_at','desc')->paginate(10)
        ]);
    }

    public function create()
    {
        return view('admin.blog.create',[
          'post' => new Page()
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
            'page_type' => 'blog_post'
        ]);
        return redirect('/posts')->with('success', 'Post created successfully.');
    }
}
