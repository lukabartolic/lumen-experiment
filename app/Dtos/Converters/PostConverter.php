<?php


namespace App\Dtos\Converters;


use App\Dtos\Post\Post;
use App\Dtos\Post\PostCollection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PostConverter
{
    public static function toDto(Model $post): Post {
        return new Post([
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'userId' => $post->user_id
        ]);
    }

    public static function fromDto(Post $post): \App\Models\Post {
        return new \App\Models\Post([
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body,
            'user_id' => $post->userId
        ]);
    }

    public static function toDtos(Collection $posts): PostCollection {
        return new PostCollection(
            $posts->map(function ($item) {
                return self::toDto($item);
            })->toArray()
        );
    }

    public static function fromDtos(PostCollection $posts): Collection {
        return new Collection(
            collect($posts)->map(function ($item) {
                return self::fromDto($item);
            })
        );
    }
}
