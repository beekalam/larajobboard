<?php

namespace Tests\Unit;

use App\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreatePageTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    function to_create_static_pages_title_and_content_is_required()
    {
        $this->adminSignIn();
        $this->post('/pages', [])
             ->assertSessionHasErrors('title')
             ->assertSessionHasErrors('content');
    }

    /** @test */
    function can_create_static_page()
    {
        $this->adminSignIn();
        $attributes = [
            'title'   => 'my title',
            'content' => 'some content'
        ];
        $this->post('/pages', $attributes)->assertRedirect('/pages');
        $this->assertDatabaseHas('pages', $attributes);
        $this->assertDatabaseHas('pages', ['page_type' => 'static_page']);
    }

    /** @test */
    function can_delete_pages()
    {
        $this->adminSignIn();
        $page = factory(Page::class)->create();
        $this->delete('/pages/' . $page->id);
        $this->assertEquals(0, Page::count());
    }

    /** @test */
    function authenticated_user_may_update_pages()
    {
        $this->withoutExceptionHandling();
        $this->adminSignIn();
        $page = factory(Page::class)->create();
        $attrs = [
            'title'               => 'title changed',
            'content'             => 'content changed',
            'show_in_header_menu' => 'on',
            'show_in_footer_menu' => 'on',
        ];

        $this->patch('/pages/' . $page->id, $attrs);
        $this->assertDatabaseHas('pages', [
            'title'               => 'title changed',
            'content'             => 'content changed',
            'show_in_footer_menu' => 1,
            'show_in_header_menu' => 1,
        ]);
    }

}