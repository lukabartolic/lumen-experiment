<?php


namespace App\Clients\JsonPlaceholder;

use App\Clients\JsonPlaceholder\Resources\CommentResource;
use App\Clients\JsonPlaceholder\Resources\PostResource;

class JsonPlaceholder
{
    public function __construct()
    {

    }

    public function postResource(): PostResource {
        return new PostResource();
    }

    public function commentResource(): CommentResource {
        return new CommentResource();
    }
}
