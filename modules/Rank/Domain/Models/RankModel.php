<?php

namespace Rank\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property int $rating
 *
 * @property-read User $user
 */
class RankModel extends Model
{
    protected $table = 'ranks';

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
