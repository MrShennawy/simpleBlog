<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('blogs', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('blogs', function(Blueprint $table) {
			$table->foreign('cat_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->foreign('blog_id')->references('id')->on('blogs')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
	}

	public function down()
	{
		Schema::table('blogs', function(Blueprint $table) {
			$table->dropForeign('blogs_user_id_foreign');
		});
		Schema::table('blogs', function(Blueprint $table) {
			$table->dropForeign('blogs_cat_id_foreign');
		});
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
        });
        Schema::table('comments', function(Blueprint $table) {
            $table->dropForeign('comments_blog_id_foreign');
        });
	}
}