<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;


class FrontBlogController extends Controller
{
	public function index(){
		return view('blog.index',[
			'posts' => Page::where('page_type','blog_post')->orderBy('created_at','desc')->paginate(5)
		]);
	}

	public function post(Page $post)
	{
		return view('blog.post',[
			'post' => $post
		]);	
	}
}
