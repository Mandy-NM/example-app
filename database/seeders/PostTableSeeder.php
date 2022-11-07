<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new Post;
        $p->user_id = 1;
        $p->title = 'testing 1';
        $p->content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu.';
        $p->publish_status = 'private';
        $p->created_at = now();
        $p->updated_at = now();
        $p->save();

        Post::factory()->count(10)->create();
    }
}
