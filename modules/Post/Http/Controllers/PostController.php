<?php

namespace Post\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Post\Application\Actions\CreatePostAction;
use Post\Application\Actions\DeletePostAction;
use Post\Application\Actions\UpdatePostAction;
use Post\Application\Data\Request\CreatePostRequestData;
use Post\Application\Data\Request\DeletePostRequestData;
use Post\Application\Data\Request\ShowPostRequestData;
use Post\Application\Data\Request\UpdatePostRequestData;
use Post\Application\Data\Response\CreatePostResponseData;
use Post\Application\Data\Response\UpdatePostResponseData;
use Post\Domain\Data\PostUserData;
use Post\Domain\Events\PostDislikeEvent;
use Post\Domain\Events\PostLikeEvent;
use Post\Domain\Interfaces\PostRepositoryInterface;
use Post\Infrastructure\Adapters\RankAdapter;

class PostController extends Controller
{
    public function create(
        CreatePostRequestData $data,
        CreatePostAction      $action,
    ): CreatePostResponseData {
        $response = $action->execute($data->createPostData());

        return new CreatePostResponseData(
            id: $response->id
        );
    }

    public function index(PostRepositoryInterface $postRepository): JsonResponse
    {
       return new JsonResponse($postRepository->getAll());
    }

    public function update(
        UpdatePostRequestData $data,
        UpdatePostAction $action
    ): UpdatePostResponseData {
        $response = $action->execute($data->updatePostData());

        return new UpdatePostResponseData(
            id: $response->id,
        );
    }

    public function show(
        ShowPostRequestData $data,
        PostRepositoryInterface $postRepository
    ): JsonResponse {
        return new JsonResponse($postRepository->findByIdOrFail($data->id));
    }

    public function delete(
        DeletePostRequestData $data,
        DeletePostAction $action,
    ): void {
        $action->execute($data->postDeleteData());
    }

    public function like()
    {
        PostLikeEvent::dispatch(PostUserData::fromData());
    }

    public function dislike()
    {
        PostDislikeEvent::dispatch(PostUserData::fromData());
    }

    public function rank(RankAdapter $adapter)
    {
        return $adapter->getUserRank(1);
    }
}
