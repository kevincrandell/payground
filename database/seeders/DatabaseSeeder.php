<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            LessonSeeder::class,
            SegmentSeeder::class,
            UserSeeder::class,
            PracticeRecordSeeder::class,
        ]);
    }
}
