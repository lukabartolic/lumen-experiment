<?php


namespace App\Dtos;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\DataTransferObjectCollection;

class PaginationData extends DataTransferObject
{
    public int $limit;
    public int $total;
    public int $current;
    public int $last;

    public function __construct(LengthAwarePaginator $paginator)
    {
        parent::__construct([
            'limit' => $paginator->perPage(),
            'total' => $paginator->total(),
            'current' => $paginator->currentPage(),
            'last' => $paginator->lastPage()
        ]);

        // overrides...
    }
}
