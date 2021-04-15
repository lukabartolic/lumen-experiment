<?php


namespace App\Dtos\Post;


use Spatie\DataTransferObject\DataTransferObjectCollection;

class PostCollection extends DataTransferObjectCollection
{
    public function current(): Post
    {
        return parent::current();
    }
}
