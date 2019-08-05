<?php

use Illuminate\Database\Seeder;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('states')->delete();

        $states = file_get_contents(database_path("/seeds/states.json"));
        $states = json_decode($states,JSON_OBJECT_AS_ARRAY);
        \DB::table('states')->insert($states);
    }
}
