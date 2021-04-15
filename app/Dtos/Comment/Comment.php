<?php


namespace App\Dtos\Comment;


use App\Dtos\Post\Post;
use Spatie\DataTransferObject\DataTransferObject;

class Comment extends DataTransferObject
{
    public int $id;
    public string $body;
    public Post $post;

    public function __construct(int $id, string $body, Post $post)
    {
        parent::__construct([
            "id" => $id,
            "body" => $body,
            "post" => $post
        ]);

        // overrides...
    }
}
