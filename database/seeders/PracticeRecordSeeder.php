<?php

namespace Database\Seeders;

use App\Models\PracticeRecord;
use Illuminate\Database\Seeder;

class PracticeRecordSeeder extends Seeder
{
    public function run(): void
    {
        PracticeRecord::factory()
            ->count(50000)
            ->create();
    }
}
