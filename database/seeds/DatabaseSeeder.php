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
        $faker = Faker\Factory::create();

        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create([
            "email"     => "admin@demo.com",
            "password"  => bcrypt('secret'),
            'user_type' => 'admin'
        ]);

        factory(User::class)->create([
            'email'     => 'employer@demo.com',
            'password'  => bcrypt('secret'),
            'user_type' => 'employer',
            'logo'      => '7MqwXm0AOHA8aMgWQspc8QdPahN1Bw1FSdiP9Re2.jpeg'
        ]);

        factory(User::class)->create([
            'email'     => 'user@demo.com',
            'password'  => bcrypt('secret'),
            'user_type' => 'user',
        ]);

        $this->call(CategoryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        factory(Page::class)->create([
            'title'     => 'About us',
            'content'   => 'About us content',
            'page_type' => 'static_page'
        ]);
        factory(Page::class)->create([
            'title'     => 'Terms & Conditions',
            'content'   => 'Terms and and conditions',
            'page_type' => 'static_page',
        ]);

        foreach(range(1,20) as $i){
            factory(Page::class)->create([
                'page_type'     => 'blog_post',
                'feature_image' => 'feature_image_'. random_int(1,3) .'.jpg',
            ]);
        }

        // factory(Page::class,20)->create([
            // 'page_type' => 'blog_post'
        // ]);
        factory(\App\Job::class, 300)->create();
    }
}
