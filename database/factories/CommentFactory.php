<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::all()->pluck('id')->toArray(); //get all the user id
        $postIds = Post::all()->pluck('id')->toArray(); //get all the post id

        return [
            'user_id' => fake()->randomElement($userIds),
            'post_id' => fake()->randomElement($postIds),
            'content' => fake()->paragraph(),
            'created_at' => fake()-> dateTime(),
            'updated_at' => now(),
        ];
    }
}
