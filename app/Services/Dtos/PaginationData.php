<?php


namespace App\Services\Dtos;


use Illuminate\Pagination\LengthAwarePaginator;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\DataTransferObjectCollection;

class PaginationData extends DataTransferObject
{
    public int $count;
    public int $total;
    public int $current;
    public int $last;

    public function __construct(LengthAwarePaginator $paginator)
    {
        parent::__construct([
            'count' => $paginator->count(),
            'total' => $paginator->total(),
            'current' => $paginator->currentPage(),
            'last' => $paginator->lastPage()
        ]);

        // overrides...
    }
}
