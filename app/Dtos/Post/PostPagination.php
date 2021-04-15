<?php


namespace App\Dtos\Post;


use App\Dtos\PaginationData;
use Spatie\DataTransferObject\DataTransferObject;

class PostPagination extends DataTransferObject
{
    public PostCollection $items;
    public PaginationData $pagination;
}
