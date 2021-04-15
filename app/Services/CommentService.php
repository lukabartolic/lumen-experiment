<?php


namespace App\Services;


use App\Clients\JsonPlaceholder\JsonPlaceholder;
use App\Dtos\Comment\Comment;

class CommentService
{
    private JsonPlaceholder $apiClient;

    public function __construct(JsonPlaceholder $jsonPlaceholder)
    {
        $this->apiClient = $jsonPlaceholder;
    }

    public function postService() {
        return app()->make(PostService::class);
    }

    public function get(int $id) {
        $comment = $this->apiClient->commentResource()->getComment($id);
        $post = $this->postService()->get($comment->postId);

        return new Comment($comment->id, $comment->body, $post);
    }

    public function getComments() {
        $comments = $this->apiClient->commentResource()->getComments();

        return $comments;
    }

    public function getByPost(int $postId) {
        $comments = $this->apiClient->commentResource()->getForPost($postId);

        return $comments;
    }
}
