<?php

namespace Database\Factories;

use App\Models\Post;
use Faker\Generator as Faker;


use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        Factory::define(Post::class, function (Faker $faker) {
            return [
                'title' => $faker->sentence(5),
                'description' => $faker->text(),
                'user_id' => $faker->unique()->numberBetween(1, 3),
            ];
        });
    }
}
