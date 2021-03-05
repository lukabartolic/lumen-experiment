<?php


namespace App\Services;


use App\Clients\JsonPlaceholder\JsonPlaceholder;
use App\Services\Dtos\Converters\PostConverter;
use App\Services\Dtos\PaginationData;
use App\Services\Dtos\Post;
use App\Services\Dtos\PostCollection;
use App\Services\Dtos\PostPagination;
use App\Support\PageableCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use function Symfony\Component\String\s;

class PostService
{
    private JsonPlaceholder $apiClient;

    public function __construct(JsonPlaceholder $jsonPlaceholder)
    {
        $this->apiClient = $jsonPlaceholder;
    }

    public function get(int $id) {
        $post = $this->apiClient->postResource()->getPost($id);

        return new Post($post->toArray());
    }

    public function getPosts(int $page = 1, int $userId = null) {
        $posts = $this->apiClient->postResource()->getPosts($userId);

        $postDtos = PostConverter::toDtos($posts);

        //$paged = new LengthAwarePaginator($items->forPage($page, 5), $items->count(), 5, 1);

        $paged = (new PageableCollection($postDtos->toArray()))->paginate(5, $page);

        return new PostPagination(['items' => $paged->items(), 'pagination' => new PaginationData($paged)]);
    }

    public function findPostByComment(int $commentId) {

    }
}
