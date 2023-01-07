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
        $pi->url = 'https://www.google.com/url?sa=i&url=https%3A%2F%2Fwww.fotor.com%2Fblog%2Fhow-to-blur-part-of-a-picture%2F&psig=AOvVaw2Y5kn2iDtQxzeqe9U7iX6H&ust=1673147288836000&source=images&cd=vfe&ved=0CA0QjRxqFwoTCKjMxsG9tPwCFQAAAAAdAAAAABAD';
        $pi->save();

        PostImage::factory()->count(10)->create();
    }
}
