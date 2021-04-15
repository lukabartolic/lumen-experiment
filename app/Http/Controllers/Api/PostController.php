<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CommentService;
use App\Services\PostService;
use App\Support\PageableCollection;

class PostController extends Controller
{
    private PostService $postService;
    private CommentService $commentService;

    public function __construct(PostService $postService, CommentService $commentService)
    {
        $this->postService = $postService;
        $this->commentService = $commentService;
    }

    public function get(int $id) {
        $post = $this->postService->get($id);

        return response()->json($post, 200);
    }

    public function getPosts() {
        $userId = request()->query('userId');
        $page = (request()->query('page')) ?: 1;

        $posts = $this->postService->getPosts($page, $userId)->toArray();

        return response()->json($posts, 200);
    }

    public function getMostPopular() {

    }
}
