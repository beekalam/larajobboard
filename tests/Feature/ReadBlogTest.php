<?php

namespace Tests\Unit;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadBlogPostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_view_blog_list()
    {
        $post = factory(Page::class)->create();
        $this->get('/blog')
             ->assertStatus(200)
             ->assertSee($post->title);
    }

    /** @test */
    public function can_view_single_blog_post()
    {
        $post = factory(Page::class)->create();
        $this->get('/blog/' . $post->id)
             ->assertStatus(200)
             ->assertSee($post->title);
    }

}