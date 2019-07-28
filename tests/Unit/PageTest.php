<?php

namespace Tests\Unit;

use App\Page;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PageTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function can_read_static_pages()
    {
        factory(Page::class)->create(['page_type' => 'static_page']);
        $this->assertEquals(1, Page::staticPages()->count());
    }

    /** @test */
    function to_create_static_pages_title_and_content_is_required()
    {
      $this->signIn();
      $this->post('/pages',[])
          ->assertSessionHasErrors('title')
          ->assertSessionHasErrors('content');
    }

    /** @test */
    function can_create_static_page()
    {
        $this->signIn();
        $attributes = [
            'title'   => 'my title',
            'content' => 'some content'
        ];
        $this->post('/pages', $attributes)->assertRedirect('/pages');
        $this->assertDatabaseHas('pages', $attributes);
        $this->assertDatabaseHas('pages', ['page_type' => 'static_page']);
    }

}