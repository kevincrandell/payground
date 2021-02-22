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
