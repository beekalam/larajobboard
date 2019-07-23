<?php

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
        // $this->call(UsersTableSeeder::class);
        factory(User::class)->create([
            "email"     => "beekalam@gmail.com",
            "password"  => bcrypt('secret'),
            'user_type' => 'admin'
        ]);

        factory(User::class)->create([
            'email'     => 'beekalam2@gmail.com',
            'password'  => bcrypt('secret'),
            'user_type' => 'employer',
            'logo' => '7MqwXm0AOHA8aMgWQspc8QdPahN1Bw1FSdiP9Re2.jpeg'
        ]);

        $this->call(CategoryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(StateTableSeeder::class);
        factory(\App\Job::class, 300)->create();
    }
}
