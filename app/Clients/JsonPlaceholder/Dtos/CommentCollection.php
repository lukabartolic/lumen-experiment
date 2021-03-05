<?php


namespace App\Clients\JsonPlaceholder\Dtos;


use Spatie\DataTransferObject\DataTransferObjectCollection;

class CommentCollection extends DataTransferObjectCollection
{
    public function current(): Comment
    {
        return parent::current();
    }
}
