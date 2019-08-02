<?php

namespace Tests\Unit;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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
        $this->delete('/posts/' . $post->id)->assertRedirect('/login');
    }

    /** @test */
    function admin_can_view_blog_posts()
    {
        $this->signIn();
        $blog_post = factory(Page::class)->create(['page_type' => 'blog_post']);
        $this->get('/posts/')->assertSee($blog_post->title);
    }

    /** @test */
    function admin_can_create_blog_posts()
    {
        $this->signIn();
        $attributes = [
            'title'   => 'post title',
            'content' => 'post_content'
        ];
        $this->post('/posts', $attributes);
        $attributes['page_type'] = 'blog_post';
        $this->assertDatabaseHas('pages', $attributes);
    }

    /** @test */
    function admin_can_update_posts()
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

    /** @test */
    function admin_can_delete_posts()
    {
        $this->signIn();
        $blog_post = factory(Page::class)->create(['page_type' => 'blog_post']);
        $this->delete('/posts/' . $blog_post->id);
        $this->assertDatabaseMissing('pages', $blog_post->toArray());
    }

    /** @test */
    function can_upload_a_blog_feature_image()
    {
        $this->signIn();
        Storage::fake('public');
        $feature_image = UploadedFile::fake()->image('feature_image.jpg');
        $attributes = [
            'title'         => 'post title',
            'content'       => 'post_content',
            'feature_image' => $feature_image
        ];
        $this->post('/posts', $attributes);
        Storage::disk('public')->assertExists('/blog_images/' . $feature_image->hashName());
        $this->assertNotNull(Page::first()->feature_image);
    }

    /** @test */
    function can_update_a_blog_feature_image()
    {
        $this->withoutExceptionHandling();
        $this->signIn();
        $post = factory(Page::class)->create(['feature_image' => 'image.jpg', 'page_type' => 'blog_post']);
        Storage::fake('public');
        $feature_image = UploadedFile::fake()->image('feature_image.jpg');
        $attributes = [
            'feature_image' => $feature_image,
            'title'         => 'changed title',
            'content'       => 'content'
        ];
        $this->patch('/posts/' . $post->id, $attributes);
        Storage::disk('public')->assertExists('/blog_images/' . $feature_image->hashName());
        $this->assertNotNull(Page::first()->feature_image);
    }

}