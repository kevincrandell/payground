<?php

namespace Database\Seeders;

use App\Models\Segment;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    const QTY = 3000;

    public function run(): void
    {
        Segment::factory()
            ->count(self::QTY)
            ->create();
    }
}
