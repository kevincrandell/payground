<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LessonResult
 *
 * This class reflects the subset of data returned to the user.
 *
 * @property int $id
 * @property boolean $isComplete
 * @property string $difficulty
 * @mixin \Eloquent
 */
class LessonResult extends Model
{
	/**
	* Returns a list of all lessons for $userId, along with difficulty level and whether a segment
	* was passed in the lesson or not.
	*/
	static function get($userId, $passScore = 80) {
		// sub-query to get count of practice records that have passed for the user
		// NOTE: isComplete is cast to a boolean, so 0 will be false and any other number will be true
        $isComplete = \DB::raw("
			SELECT COUNT(*)
			FROM practice_records p
			WHERE p.segment_id = s.id AND p.score >= $passScore AND p.user_id = ?
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
        return array("lessons" =>
			self::join("segments AS s", "s.lesson_id", "=", "l.id")
				->selectRaw(\DB::raw("l.id, ({$isComplete}) as isComplete, ($difficulty) as difficulty"))
				->from('lessons AS l')
				->setBindings([$userId])
				->get()
				->toArray()
        );
	}

    protected $table = "lessons";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'isComplete',
        'difficulty',
    ];

    protected $casts = [
        'isComplete' => 'boolean',
    ];
}
