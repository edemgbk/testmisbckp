<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     //
    // }


    public function run()
    {
        //
        factory('App\User', 10)->create();

    }
}
