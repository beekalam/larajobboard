<?php

namespace Tests\Unit;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateBlogPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    function unauthenticated_users_may_not_view_create_or_edit_blog_pages()
    {
        $this->get('/posts/')->assertRedirect('/login');
        $this->post('/posts/', [])->assertRedirect('/login');

        $post = factory(Page::class)->create();
        $this->get("/posts/{$post->id}/edit")->assertRedirect('/login');
        $this->patch('/posts/' . $post->id, [])->assertRedirect('/login');
    }

    /** @test */
    function authenticated_admin_can_view_blog_posts()
    {
        $this->signIn();
        $blog_post = factory(Page::class)->create(['page_type' => 'blog_post']);
        $this->get('/posts/')->assertSee($blog_post->title);
    }

    /** @test */
    function authenticated_admin_can_update_posts()
    {
        $this->signIn();
        $blog_post = factory(Page::class)->create(['page_type' => 'blog_post']);
        $attributes = [
            'title'   => 'title changed',
            'content' => 'content changed',
        ];
        $this->patch("/posts/{$blog_post->id}", $attributes);
        $this->assertDatabaseHas('pages', $attributes);
    }


}