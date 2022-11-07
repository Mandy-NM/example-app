<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */


    public function definition()
    {
        //$max_user_id = DB::table('users')->max('id');
        $userIds = User::all()->pluck('id')->toArray(); //get all the user id

        return [
            'user_id' => fake()->randomElement($userIds),
            'title' => fake()->sentence(),
            'content' => fake()->paragraph(),
            'publish_status' => fake()->randomElement(['private','public']),
            'created_at' => fake()-> dateTime(),
            'updated_at' => now(),
        ];
    }
}
