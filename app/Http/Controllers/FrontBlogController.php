<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;


class FrontBlogController extends Controller
{
	public function index(){
		return view('blog.index',[
			'posts' => Page::where('page_type','blog_post')->get()
		]);
	}

	public function post(Page $post)
	{
		return view('blog.post',[
			'post' => $post
		]);	
	}
}
