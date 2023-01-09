<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $u->name = 'admin';
        $u->user_type = 'admin';
        $u->email = 'admin@test.com';
        $u->email_verified_at = now();
        $u->password = Hash::make('12345678');
        $u->save();

        $u = new User;
        $u->name = 'user';
        $u->user_type = 'general';
        $u->email = 'user@test.com';
        $u->email_verified_at = now();
        $u->password = Hash::make('12345678');
        $u->save();

        User::factory()->count(5)->create();
        

    }
}
