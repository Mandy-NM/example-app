<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EditPostPermission>
 */
class EditPostPermissionFactory extends Factory
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

        return
        [
            'user_id' => fake()->randomElement($userIds),
            'post_id' => fake()->randomElement($postIds),
        ];
    }
}
