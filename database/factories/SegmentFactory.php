<?php

namespace Database\Factories;

use App\Models\Lesson;
use App\Models\Segment;
use Database\Seeders\LessonSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class SegmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Segment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ucwords(join(' ', $this->faker->words(rand(2, 5)))),
            'order' => rand(1, 30),
            'lesson_id' => rand(1, LessonSeeder::QTY),
        ];
    }
}
