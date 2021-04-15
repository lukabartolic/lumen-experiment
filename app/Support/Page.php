<?php


namespace App\Support;


use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Page
{
    private LengthAwarePaginator $paginator;
    private Collection $data;

    public function __construct(LengthAwarePaginator $paginator, array $items)
    {
        $this->paginator = $paginator;
        $this->data = collect($items);
    }

    /**
     * @return Collection
     */
    public function getData(): Collection
    {
        return $this->data;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getPaginator(): LengthAwarePaginator
    {
        return $this->paginator;
    }
}
