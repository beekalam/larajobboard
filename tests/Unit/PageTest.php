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
    function can_read_pages_with_show_in_footer_menu_flag_on()
    {
        factory(Page::class)->create(['show_in_footer_menu' => 1, 'page_type' => 'static_page']);
        $this->assertEquals(1,Page::footerPages()->count());
        $this->assertEquals(0,Page::headerPages()->count());
    }

    /** @test */
    function can_read_pages_with_show_in_header_menu_flag_on()
    {
        factory(Page::class)->create(['show_in_header_menu' => 1, 'page_type' => 'static_page']);
        $this->assertEquals(1,Page::headerPages()->count());
        $this->assertEquals(0,Page::footerPages()->count());
    }



}