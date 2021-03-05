<?php


namespace App\Services\Dtos;


use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\DataTransferObject;

class PostPagination extends DataTransferObject
{
    public PostCollection $items;
    public PaginationData $pagination;
}
