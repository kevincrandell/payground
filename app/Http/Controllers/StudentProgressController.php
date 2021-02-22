<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;

class StudentProgressController extends Controller
{
    public function get(int $userId): JsonResponse
    {
        return response()->json(
            Lesson::with(['segments','segments.practiceRecords' => function(HasMany $query) use ($userId) {
                $query->where('user_id', $userId);
            }])
                ->where('is_published',true)
                ->get()
                ->toArray()
        );
    }
}
