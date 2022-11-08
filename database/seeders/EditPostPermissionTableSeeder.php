<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditPostPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $p = new EditPostPermission;
        $p->post_id = 1;
        $p->user_id = 1;
        $p->save();

        //EditPostPermission::factory()->count(10)->create();

    }
}
