<?php


namespace App\Clients\JsonPlaceholder\Resources;


use App\Clients\JsonPlaceholder\ApiBase;
use App\Clients\JsonPlaceholder\Dtos\Post;
use App\Clients\JsonPlaceholder\Dtos\PostCollection;
use Illuminate\Support\Collection;

class PostResource extends ApiBase
{

    public function getPost(int $id) {
        $response = $this->client->request('GET', '/posts/' . $id);

        $responseBody = $this->getBodyContents($response);

        $post = new Post($responseBody);

        return $post;
    }

    public function getPosts(int $userId = null): PostCollection {
        $response = $this->client->request('GET', '/posts', [
            'query' => ['userId' => $userId]
        ]);

        $responseBody = $this->getBodyContents($response);

        $posts = new PostCollection(
            collect($responseBody)->map(function ($item) {
                return new Post($item);
            })->toArray()
        );

        return $posts;
    }

}
