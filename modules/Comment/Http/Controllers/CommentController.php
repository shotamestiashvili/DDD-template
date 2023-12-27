<?php

namespace Comment\Http\Controllers;

use App\Http\Controllers\Controller;
use Comment\Application\Actions\CreateCommentAction;
use Comment\Application\Actions\DeleteCommentAction;
use Comment\Application\Actions\UpdateCommentAction;
use Comment\Application\Data\Request\CreateCommentRequestData;
use Comment\Application\Data\Request\DeleteCommentRequestData;
use Comment\Application\Data\Request\ShowCommentRequestData;
use Comment\Application\Data\Request\UpdateCommentRequestData;
use Comment\Application\Data\Response\CreateCommentResponseData;
use Comment\Application\Data\Response\UpdateCommentResponseData;
use Comment\Domain\Data\CommentUserData;
use Comment\Domain\Events\CommentDislikeEvent;
use Comment\Domain\Events\CommentLikeEvent;
use Comment\Domain\Interfaces\CommentRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CommentController extends Controller
{
    public function create(
        CreateCommentRequestData $data,
        CreateCommentAction      $action,
    ): CreateCommentResponseData {

        $response = $action->execute($data->createCommentData());

        return new CreateCommentResponseData(
            id: $response->id
        );
    }

    public function index(CommentRepositoryInterface $postRepository): JsonResponse
    {
        return new JsonResponse($postRepository->getAll());
    }

    public function update(
        UpdateCommentRequestData $data,
        UpdateCommentAction $action
    ):UpdateCommentResponseData {
        $response = $action->execute($data->updateCommentData());

        return new UpdateCommentResponseData(
            id: $response->id,
        );
    }

    public function show(
        ShowCommentRequestData $data,
        CommentRepositoryInterface $postRepository
    ): JsonResponse {
        return new JsonResponse($postRepository->findByIdOrFail($data->id));
    }

    public function delete(
        DeleteCommentRequestData $data,
        DeleteCommentAction $action,
    ): void {
        $action->execute($data->postDeleteData());
    }

    public function like()
    {
        CommentLikeEvent::dispatch(CommentUserData::fromData());
    }

    public function dislike()
    {
        CommentDislikeEvent::dispatch(CommentUserData::fromData());
    }
}
