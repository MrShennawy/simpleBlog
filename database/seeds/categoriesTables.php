<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Factory as Faker;

class categoriesTables extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,7) as $index) {
	        $newCat = Category::create([
                'name' 		=> $faker->word,
	        	]);
            echo 'Category => '.$newCat->id."\n";
        }
    }
}
