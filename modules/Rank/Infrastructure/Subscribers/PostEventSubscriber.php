<?php

namespace Rank\Infrastructure\Subscribers;

use Comment\Domain\Events\CommentDislikeEvent;
use Comment\Domain\Events\CommentLikeEvent;
use Illuminate\Events\Dispatcher;
use Post\Domain\Events\PostDislikeEvent;
use Post\Domain\Events\PostLikeEvent;
use Rank\Application\Actions\UpdateRatingAction;
use Rank\Application\Data\Internal\PostData;
use Rank\Domain\Enums\PostWeightEnums;

class PostEventSubscriber
{
    public function __construct(private readonly UpdateRatingAction $action)
    {
    }

    public function likeEvent(PostLikeEvent $event): void
    {
        $this->action->execute(new PostData(
            userId: $event->data->userId,
            weight: PostWeightEnums::LIKE,
        ));
    }

    public function dislikeEvent(PostDislikeEvent $event): void
    {
        $this->action->execute(new PostData(
            userId: $event->data->userId,
            weight: PostWeightEnums::DISLIKE,
        ));
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            PostLikeEvent::class => 'likeEvent',
            PostDislikeEvent::class => 'dislikeEvent',
        ];
    }
}
