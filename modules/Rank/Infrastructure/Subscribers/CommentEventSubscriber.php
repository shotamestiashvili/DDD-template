<?php

namespace Rank\Infrastructure\Subscribers;

use Comment\Domain\Events\CommentDislikeEvent;
use Comment\Domain\Events\CommentLikeEvent;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;
use Rank\Application\Actions\UpdateRatingAction;
use Rank\Application\Data\Internal\CommentData;
use Rank\Domain\Enums\CommentWeightEnums;

class CommentEventSubscriber
{
    public function __construct(private readonly UpdateRatingAction $action)
    {
    }

    public function likeEvent(CommentLikeEvent $event): void
    {
        Log::info($event->data->userId);
        $this->action->execute(new CommentData(
            userId: $event->data->userId,
            weight: CommentWeightEnums::LIKE,
        ));
    }

    public function dislikeEvent(CommentDislikeEvent $event): void
    {
        Log::info($event->data->userId);
        $this->action->execute(new CommentData(
            userId: $event->data->userId,
            weight: CommentWeightEnums::DISLIKE,
        ));
    }

    public function subscribe(Dispatcher $events): array
    {
        return [
            CommentLikeEvent::class => 'likeEvent',
            CommentDislikeEvent::class => 'dislikeEvent',
        ];
    }
}
