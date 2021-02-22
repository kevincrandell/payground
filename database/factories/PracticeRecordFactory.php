<?php

namespace Database\Factories;

use App\Models\PracticeRecord;
use Database\Seeders\SegmentSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Eloquent\Factories\Factory;

class PracticeRecordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PracticeRecord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'segment_id' => rand(1, SegmentSeeder::QTY),
            'user_id' => rand(1, UserSeeder::QTY),
            'session_uuid' => $this->faker->uuid,
            'tempo_multiplier' => $this->faker->randomFloat(2, 0.01, 1.2),
            'score' => self::getScore(),
        ];
    }

    /**
     * Get a score between 0 and 100, with a hard-coded probability
     * - A perfect score -  ~1% of practice records
     * - A passing score -  ~9% of practice records
     * - A failing score - ~90% of practice records
     */
    private static function getScore(): int
    {
        $weight = rand(1, 100);

        if ($weight == 1) {
            return self::getPerfectScore();
        } else if ($weight < 10) {
            return self::getPassingScore();
        } else {
            return self::getFailingScore();
        }
    }

    private static function getPassingScore(): int
    {
        return rand(80, self::getPerfectScore());
    }

    private static function getFailingScore(): int
    {
        return rand(0, 79);
    }

    private static function getPerfectScore(): int
    {
        return 100;
    }
}
