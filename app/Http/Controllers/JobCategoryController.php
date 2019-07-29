<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class JobCategoryController extends Controller
{
    public function show(Category $category)
    {
        $jobs = $category->jobs()->paginate(5);

        return view('category.index',compact('jobs','category'));
    }
}
