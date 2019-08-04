<?php

namespace Tests\Feature;

use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HomePageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function when_visiting_home_page_should_see_list_of_categories()
    {
        $category = factory(Category::class)->create();
        $this->get('/')
             ->assertStatus(200)
             ->assertSee($category->name);
    }
}
