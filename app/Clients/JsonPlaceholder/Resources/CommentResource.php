<?php


namespace App\Clients\JsonPlaceholder\Resources;


use App\Clients\JsonPlaceholder\ApiBase;
use App\Clients\JsonPlaceholder\Dtos\Comment;
use App\Clients\JsonPlaceholder\Dtos\CommentCollection;
use Illuminate\Support\Collection;

class CommentResource extends ApiBase
{

    public function getComments() {
        $response = $this->client->request('GET', '/comments');

        $responseBody = $this->getBodyContents($response);

        $comments = new CommentCollection(
            collect($responseBody)->map(function ($item) {
                return new Comment($item);
            })->toArray()
        );;

        return $comments;
    }

    public function getComment(int $id) {
        $response = $this->client->request('GET', '/comments/' . $id);

        $responseBody = $this->getBodyContents($response);

        $comment = new Comment($responseBody);

        return $comment;
    }

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
