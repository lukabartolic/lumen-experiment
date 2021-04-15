<?php


namespace App\Services;


use App\Clients\JsonPlaceholder\JsonPlaceholder;
use App\Repositories\PostRepository;
use App\Dtos\Converters\PostConverter;
use App\Dtos\PaginationData;
use App\Dtos\Post\Post;
use App\Dtos\Post\PostPagination;
use App\Support\PageRequest;

class PostService
{
    private JsonPlaceholder $apiClient;
    private PostRepository $postRepository;

    public function __construct(JsonPlaceholder $jsonPlaceholder, PostRepository $postRepository)
    {
        $this->apiClient = $jsonPlaceholder;
        $this->postRepository = $postRepository;
    }

    public function get(int $id) {
        $post = $this->postRepository->findById($id);

        return PostConverter::toDto($post);
    }

    public function getPosts(int $page = 1, int $userId = null) {
        $posts = $this->postRepository->findAll(PageRequest::set(10, $page));

        $postDtos = PostConverter::toDtos($posts->getData());

        return new PostPagination(['items' => $postDtos, 'pagination' => new PaginationData($posts->getPaginator())]);
    }
}
