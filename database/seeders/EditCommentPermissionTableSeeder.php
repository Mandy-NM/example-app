<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EditCommentPermission;

class EditCommentPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new EditCommentPermission;
        $p->comment_id = 1;
        $p->user_id = 1;
        $p->save();

        EditCommentPermission::factory()->count(10)->create();
    }
}
