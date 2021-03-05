<?php


namespace App\Services;


use App\Clients\JsonPlaceholder\JsonPlaceholder;

class CommentService
{
    private JsonPlaceholder $apiClient;

    public function __construct(JsonPlaceholder $jsonPlaceholder)
    {
        $this->apiClient = $jsonPlaceholder;
    }

    public function getForPost(int $postId) {
        $comments = $this->apiClient->commentResource()->getForPost($postId);

        return $comments;
    }
}
