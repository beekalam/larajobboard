<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', new Page());
        return view('admin.blog.index', [
            'posts' => Page::where('page_type', 'blog_post')->orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    public function create()
    {
        $this->authorize('create', new Page());
        return view('admin.blog.create', [
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
        $this->authorize('create', new Page());
        $this->validate($request, $this->rules());

        $attributes = [
            'title'         => request('title'),
            'content'       => request('content'),
            'page_type'     => 'blog_post',
            'feature_image' => $this->storeFeatureImage()
        ];

        Page::create($attributes);
        return redirect('/posts')->with('success', 'Post created successfully.');
    }

    public function edit(Request $request, Page $post)
    {
        $this->authorize('update', $post);
        return view('admin.blog.edit', compact("post"));
    }

    public function update(Page $post)
    {
        $this->authorize('update', $post);
        $this->validate(request(), $this->rules());
        $attributes = request()->only('title', 'content');
        $attributes['feature_image'] = $this->storeFeatureImage();

        $old_image = $post->feature_image;
        $post->update($attributes);
        $this->deleteImage($old_image);
        return redirect('/posts')->with('success', 'Post updated successfully.');
    }

    private function storeFeatureImage()
    {
        if (request()->hasFile('feature_image') && request()->file('feature_image')->isValid()) {
            return request()->feature_image->store('blog_images', 'public');
        }
        return null;
    }

    public function destroy(Page $post)
    {
        $this->authorize('delete', $post);
        $this->deleteImage($post->feature_image);
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted successfully.');
    }

    private function deleteImage($old_image)
    {
        if ($old_image) {
            Storage::disk('public')->delete($old_image);
        }
    }
}
