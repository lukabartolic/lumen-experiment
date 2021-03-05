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

    public function getForPost(int $postId) {
        $comments = $this->commentService->getForPost($postId);

        return response()->json($comments->toArray(), 200);
    }
}
