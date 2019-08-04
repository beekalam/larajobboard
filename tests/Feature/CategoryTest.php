<?php

namespace Tests\Unit;

use App\Category;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function guests_may_not_view_categories()
    {
        $this->get('/category')
             ->assertRedirect('/login');
    }

    /** @test */
    function can_view_categories()
    {
        $user = factory(User::class)->create();
        $category = factory(Category::class)->create();
        $this->be($user);
        $this->get('/category')
             ->assertSee($category->name);
    }

    /** @test */
    function authenticated_users_may_create_categories()
    {
        $user = factory(User::class)->create();
        $this->be($user);
        $this->post('/category',['name' => 'my_category']);
        $this->assertDatabaseHas('categories',['name' => 'my_category']);
    }

    /** @test */
    function category_name_should_be_unique()
    {
        $user = factory(User::class)->create();
        factory(Category::class)->create(['name' => 'my_category']);
        $this->be($user);
        $this->post('/category',['name' => 'my_category'])
            ->assertSessionHasErrors(['name']);
    }
}