<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Services\PostService;

class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct(CommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function get(int $id) {
        $comment = $this->commentService->get($id);

        return response()->json($comment, 200);
    }

    public function getComments() {
        $comments = $this->commentService->getComments();

        return response()->json($comments->toArray(), 200);
    }

    public function getForPost(int $postId) {
        $comments = $this->commentService->getByPost($postId);

        return response()->json($comments->toArray(), 200);
    }
}
