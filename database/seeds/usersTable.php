<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class usersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $newUser = User::create([
                'name' => 'Shennawy',
                'email' => 'm.alshenaawy@gmail.com',
                'isAdmin' => 1,
                'password' => bcrypt('123456')
            ]);
        echo 'User => '.$newUser->id."\n";

    	$faker = Faker::create();
    	foreach (range(1,5) as $index) {
	        $newUser = User::create([
	        		'name' => $faker->name,
	        		'email' => $faker->email,
	        		'isAdmin' => null,
	        		'password' => bcrypt('123456')
	        	]);
            echo 'User => '.$newUser->id."\n";
        }
    }
}
