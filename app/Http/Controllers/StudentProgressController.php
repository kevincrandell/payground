<?php

namespace App\Http\Controllers;

use App\Models\LessonResult;
use App\Models\PracticeRecord;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\JsonResponse;

class StudentProgressController extends Controller
{
	protected $passScore = 80;

    public function get(int $userId): JsonResponse
    {
        return response()->json(
			LessonResult::get($userId, $this->passScore)
		);
    }
}
