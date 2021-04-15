<?php


namespace App\Clients\JsonPlaceholder\Dtos;


use Spatie\DataTransferObject\DataTransferObjectCollection;

class PostCollection extends DataTransferObjectCollection
{
    public function current(): Post
    {
        return parent::current();
    }
}
