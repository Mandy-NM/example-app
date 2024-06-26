<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(PostImageTableSeeder::class);
        $this->call(CommentTableSeeder::class);

        $this->call(EditCommentPermissionTableSeeder::class);
        $this->call(EditPostPermissionTableSeeder::class);
    }
}
