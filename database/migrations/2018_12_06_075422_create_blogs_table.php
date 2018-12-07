<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBlogsTable extends Migration {

	public function up()
	{
		Schema::create('blogs', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->integer('cat_id')->unsigned();
			$table->string('title', 255);
			$table->longText('content');
			$table->timestamps();
			$table->engine = 'InnoDB';
		});
	}

	public function down()
	{
		Schema::drop('blogs');
	}
}