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
        $this->call(usersTable::class);
        $this->call(categoriesTables::class);
        $this->call(blogsTable::class);
        $this->call(commentsTable::class);
    }
}
