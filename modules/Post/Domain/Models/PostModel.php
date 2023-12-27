<?php

namespace Post\Domain\Models;

use App\Models\User;
use Comment\Domain\Models\CommentModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Post\Domain\Enums\StatusEnums;

/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $text
 * @property StatusEnums|null $status
 * @property int|null $like
 * @property int|null $dislike
 *
 * @property int $created_by
 * @property int $updated_by
 *
 * @property-read CommentModel $comment
 * @property-read User $user
 */
class PostModel extends Model
{
    use SoftDeletes;


    protected $table = 'posts';

    public function comments(): HasMany
    {
        return $this->hasMany(CommentModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
