<?php

use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('countries')->delete();
        $countries = file_get_contents(database_path("/seeds/countries.json"));
        $countries = json_decode($countries,JSON_OBJECT_AS_ARRAY);
        \DB::table('countries')->insert($countries);
    }


}
