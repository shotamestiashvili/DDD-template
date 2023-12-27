<?php

namespace Comment\Domain\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Post\Domain\Models\PostModel;
use \Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property string $text
 * @property int|null $like
 * @property int|null $dislike
 *
 * @property-read User $user
 * @property-read PostModel $post
 */
class CommentModel extends Model
{
    use SoftDeletes;

    protected $table = 'comments';


    public function post(): BelongsTo
    {
        return $this->belongsTo(PostModel::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
