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
        // $this->call(UserSeeder::class);
		  //Model::unguard();

      $this->call(UserTableSeeder::class);
      $this->call(IssueTableSeeder::class);

     // Model::reguard();
    }
}
