<?php


namespace App\Services\Dtos;


use App\Clients\JsonPlaceholder\Dtos\Post;
use Spatie\DataTransferObject\DataTransferObjectCollection;

class PostCollection extends DataTransferObjectCollection
{
    public function current(): Post
    {
        return parent::current();
    }
}
