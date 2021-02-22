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
		// sub-query to get count of practice records that have passed for the user
        $isComplete = \DB::raw("
			SELECT COUNT(*)
			FROM practice_records p
			WHERE p.segment_id = s.id AND p.score >= {$this->passScore} AND p.user_id = ?
		");
		// convert difficulty from number to strings
        $difficulty = \DB::raw("
			CASE
				WHEN l.difficulty BETWEEN 1 AND 3 THEN 'Rookie'
				WHEN l.difficulty BETWEEN 4 AND 6 THEN 'Intermediate'
				ELSE 'Advanced'
			END
		");

		// merges above query parts into one and returns filtered results
        return response()->json(
			LessonResult::join("segments AS s", "s.lesson_id", "=", "l.id")
				->selectRaw(\DB::raw("l.id, ({$isComplete}) as isComplete, ($difficulty) as difficulty"))
				->from('lessons AS l')
				->setBindings([$userId])
				->get()
				->toArray()
        );
    }
}
