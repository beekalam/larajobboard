<?php

use App\Page;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->TestSeeder();
        // $this->demoSeeder();
    }

    private function testSeeder()
    {

        $faker = Faker\Factory::create();
        $this->createUsers();
        $this->createStaticPages();
        $this->call(CategoryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);


        foreach (range(1, 20) as $i) {
            factory(Page::class)->create([
                'page_type'     => 'blog_post',
                'feature_image' => 'feature_image_' . random_int(1, 3) . '.jpg',
            ]);
        }

        factory(\App\Job::class, 300)->create([
            'user_id' => User::where('email', 'employer1@demo.com')->first()->id
        ]);

        factory(\App\Job::class, 5)->create([
            'user_id' => User::where('email', 'employer@demo.com')->first()->id
        ]);
    }

    public function demoSeeder()
    {

        $faker = Faker\Factory::create();
        $this->createUsers();
        $this->createStaticPages();
        $this->call(CategoryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);


        foreach (range(1, 20) as $i) {
            factory(Page::class)->create([
                'page_type'     => 'blog_post',
                'feature_image' => 'feature_image_' . random_int(1, 3) . '.jpg',
            ]);
        }

        // factory(Page::class,20)->create([
        // 'page_type' => 'blog_post'
        // ]);
        factory(\App\Job::class, 300)->create();
    }

    private function createUsers()
    {

        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create([
            "email"     => "admin@demo.com",
            "password"  => bcrypt('secret'),
            'user_type' => 'admin',
        ]);

        factory(User::class)->create([
            'email'     => 'employer@demo.com',
            'password'  => bcrypt('secret'),
            'user_type' => 'employer',
            'logo'      => '7MqwXm0AOHA8aMgWQspc8QdPahN1Bw1FSdiP9Re2.jpeg',
        ]);

        factory(User::class)->create([
            'email'     => 'employer1@demo.com',
            'password'  => bcrypt('secret'),
            'user_type' => 'employer',
            'logo'      => '7MqwXm0AOHA8aMgWQspc8QdPahN1Bw1FSdiP9Re2.jpeg',
        ]);

        factory(User::class)->create([
            'email'     => 'user@demo.com',
            'password'  => bcrypt('secret'),
            'user_type' => 'user',
        ]);
    }

    public function createStaticPages()
    {

        factory(Page::class)->create([
            'title'               => 'About us',
            'content'             => 'About us content',
            'page_type'           => 'static_page',
            'show_in_header_menu' => 1,
            'show_in_footer_menu' => 1,
        ]);
        factory(Page::class)->create([
            'title'               => 'Contact us',
            'content'             => 'Contact us content',
            'page_type'           => 'static_page',
            'show_in_header_menu' => 1,
            'show_in_footer_menu' => 1,
        ]);
        factory(Page::class)->create([
            'title'     => 'Terms & Conditions',
            'content'   => 'Terms and and conditions',
            'page_type' => 'static_page',
        ]);
    }


}
