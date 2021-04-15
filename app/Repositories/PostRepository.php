<?php


namespace App\Repositories;


use App\Models\Post;
use App\Support\Page;
use App\Support\PageRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PostRepository
{
    private static string $paginationPageName = "page";
    private Builder $builder;

    public function __construct()
    {
        $this->builder = Post::query();
    }

    public function findById(int $id): Model {
        return $this->builder->find($id);
    }

    public function findByUser(int $userId, PageRequest $pageRequest): Page {
        $posts = $this->builder->where("user_id", $userId);

        return $this->paginate($posts, $pageRequest);
    }

    public function findAll(PageRequest $pageRequest): Page {
        $posts = $this->builder;

        return $this->paginate($posts, $pageRequest);
    }

    public function count() {
        return $this->builder->count();
    }

    public function save() {

    }

    private function paginate(Builder $builder, PageRequest $pageRequest): Page {
        if ($pageRequest::getSortBy() != null) {
            $builder->orderBy($pageRequest::getSortBy(), ($pageRequest::getSortDirection() != null) ? $pageRequest::getSortDirection() : "asc");
        }

        $result = $builder->paginate($pageRequest::getPerPage(), ["*"], self::$paginationPageName, $pageRequest::getPage());

        return new Page($result, $result->items());
    }
}
