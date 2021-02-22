<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PracticeRecord
 *
 * @property int $id
 * @property int $segment_id
 * @property int $user_id
 * @property string $session_uuid
 * @property float $tempo_multiplier
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Segment $segment
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord query()
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereSegmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereSessionUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereTempoMultiplier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PracticeRecord whereUserId($value)
 * @mixin \Eloquent
 */
class PracticeRecord extends Model
{
    use HasFactory;

    /**
     * Get the user who created this practice record
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the segment associated with this practice record
     */
    public function segment(): BelongsTo
    {
        return $this->belongsTo(Segment::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'segment_id',
        'user_id',
        'session_uuid',
        'tempo_multiplier',
        'score',
    ];
}
