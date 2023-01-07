<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PostImage;


class PostImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pi = new PostImage;
        $pi->post_id = 1;
        $pi->url = 'https://img.freepik.com/premium-photo/christmas-snowman-character-cute-snowman-christmas-scenery-animated-illustration_692702-4006.jpg?w=2000';
        $pi->save();

        PostImage::factory()->count(10)->create();
    }
}
