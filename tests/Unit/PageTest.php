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

}