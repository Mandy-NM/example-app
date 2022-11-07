<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = new User;
        $u->name = 'Misha';
        $u->user_type = 'admin';
        $u->profile = 'hi';
        $u->email = 'misha@gmail.com';
        $u->email_verified_at = now();
        $u->password = 'passw0rd';
        $u->save();

        User::factory()->count(10)->create();
        

    }
}
