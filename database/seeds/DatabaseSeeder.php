<?php

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
			factory('App\User', 20)->create();
			factory('App\Company', 20)->create();
			factory('App\Job', 20)->create();
    }
}
