<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;


class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = new Comment;
        $c->user_id = 1;
        $c->post_id = 1;
        $c->content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eu.';
        $c->created_at = now();
        $c->updated_at = now();
        $c->save();

        Comment::factory()->count(30)->create();
    }
}
