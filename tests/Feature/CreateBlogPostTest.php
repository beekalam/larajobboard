<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Page;

class CreateBlogPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function authenticated_admin_can_view_blog_pages()
    {
        $this->signIn();
        $blog_post = factory(Page::class)->create(['page_type' => 'blog_post']);
        $this->get('/posts/')->assertSee($blog_post->title);
    }

}