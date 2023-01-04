<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostImage>
 */
class PostImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $postIds = Post::all()->pluck('id')->toArray(); //get all the post id

        return [
            'post_id' => fake()->randomElement($postIds),
            //'image' => fake() -> binary(),
            'image' => fake() -> imageUrl(),
        ];
    }
}
