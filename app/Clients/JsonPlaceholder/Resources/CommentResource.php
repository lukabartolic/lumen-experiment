<?php


namespace App\Clients\JsonPlaceholder\Resources;


use App\Clients\JsonPlaceholder\ApiBase;
use App\Clients\JsonPlaceholder\Dtos\Comment;
use App\Clients\JsonPlaceholder\Dtos\CommentCollection;
use Illuminate\Support\Collection;

class CommentResource extends ApiBase
{

    public function getForPost(int $postId) {
        $response = $this->client->request('GET', '/comments', [
            'query' => ['postId' => $postId]
        ]);

        $responseBody = $this->getBodyContents($response);

        $comments = new Collection();

        foreach ($responseBody as $commentData) {
            $comments->add(new Comment($commentData));
        }

        $comments = new CommentCollection($comments->toArray());

        return $comments;
    }

}
