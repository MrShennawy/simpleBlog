<?php

use Illuminate\Database\Seeder;
use App\Comment;
use Faker\Factory as Faker;

class commentsTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker::create();
    	foreach (range(1,200) as $index) {
	        $newCmnt = Comment::create([
                'user_id' 		=> \App\User::all()->random()->id,
                'blog_id' 		=> \App\Blog::all()->random()->id,
                'content' 		=> $faker->realText(200,1),
	        	]);
            echo 'Comment => '.$newCmnt->id." ";
        }
    }
}
