<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->text(20);
        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $this->faker->paragraph(5),
            'image' => NULL,
            'published_at' => now(),
            'type' => $this->faker->randomElement(['standard', 'premium']),
            'author_id' => rand(1, 10),
            'is_commentable' => 1,
        ];
    }
}
