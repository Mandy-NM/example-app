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
        $pi->image = 'Qm9iIHRlc3Rpbmc=';
        $pi->save();

        PostImage::factory()->count(10)->create();
    }
}
