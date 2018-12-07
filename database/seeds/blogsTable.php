<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Blog;
use Faker\Factory as Faker;

class blogsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,50) as $index) {
	        $newBlog = Blog::create([
                'user_id' 		=> \App\User::all()->random()->id,
                'cat_id' 		=> \App\Category::all()->random()->id,
                'title'      	=> $faker->realText(35,1),
                'content' 		=> $faker->realText(800,2),
	        	]);
            echo 'Blog => '.$newBlog->id."\n";
        }
    }
}
