<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$usernames = array('saqib', 'frank', 'jon', 'rick', 'tommy');

      foreach ($usernames as $key => $username) {
      	User::create([
      		'name' => $username,
      		'email' => "$username@test.com",
      		'password' => bcrypt('helloworld')
      	]);
      }
    }
}
