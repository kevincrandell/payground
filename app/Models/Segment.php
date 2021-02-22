<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Segment
 *
 * @property int $id
 * @property int $lesson_id
 * @property string $name
 * @property int $order
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lesson $lesson
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PracticeRecord[] $practiceRecords
 * @property-read int|null $practice_records_count
 * @method static \Illuminate\Database\Eloquent\Builder|Segment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Segment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Segment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Segment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Segment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Segment whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Segment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Segment whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Segment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Segment extends Model
{
    use HasFactory;

    /**
     * Get the lesson to which this segment belongs
     */
    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    /**
     * Get the practice records for this segment
     */
    public function practiceRecords(): HasMany
    {
        return $this->hasMany(PracticeRecord::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'order',
        'lesson_id',
    ];
}
