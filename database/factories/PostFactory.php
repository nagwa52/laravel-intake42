<?php

namespace Database\Factories;

use App\Models\Post;
use Faker\Generator as Faker;


use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $Model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
                'title' => $this->faker->sentence(5),
                'description' =>$this->faker->sentence(5),
                'user_id' => rand(1, 3),
            ];
    }
}
