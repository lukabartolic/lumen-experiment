<?php


namespace App\Services\Dtos\Converters;


use App\Clients\JsonPlaceholder\Dtos\Post as ApiPost;
use App\Clients\JsonPlaceholder\Dtos\PostCollection as ApiPostCollection;
use App\Services\Dtos\Post;
use App\Services\Dtos\PostCollection;

class PostConverter
{
    public static function toDto(ApiPost $post): Post {
        return new Post([
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'userId' => $post->userId
        ]);
    }

    public static function fromDto(Post $post): ApiPost {
        return new ApiPost([
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'userId' => $post->userId
        ]);
    }

    public static function toDtos(ApiPostCollection $posts): PostCollection {
        return new PostCollection(
            collect($posts)->map(function ($item) {
                return self::toDto($item);
            })->toArray()
        );
    }

    public static function fromDtos(PostCollection $posts): ApiPostCollection {
        return new ApiPostCollection(
            collect($posts)->map(function ($item) {
                return self::fromDto($item);
            })->toArray()
        );
    }
}
