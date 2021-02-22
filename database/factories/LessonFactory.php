<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords(join(' ', $this->faker->words(rand(2, 5)))),
            'description' => $this->faker->paragraph(),
            'difficulty' => rand(1, 9),
            'is_published' => (bool)rand(0, 1),
        ];
    }
}
