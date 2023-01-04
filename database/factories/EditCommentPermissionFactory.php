<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Comment;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EditCommentPermission>
 */
class EditCommentPermissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::all()->pluck('id')->toArray(); //get all the user id
        $commentIds = Comment::all()->pluck('id')->toArray(); //get all the comment id

        return [
            'user_id' => fake()->randomElement($userIds),
            'comment_id' => fake()->randomElement($commentIds),
        ];
    }
}
