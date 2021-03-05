<?php


namespace App\Support;


use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class PageableCollection extends Collection
{
    public function paginate($perPage, $page = null, $total = null, $pageName = 'page')
    {
        $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

        return new LengthAwarePaginator(
            $this->forPage($page, $perPage),
            $total ?: $this->count(),
            $perPage,
            $page,
            [
                'path' => LengthAwarePaginator::resolveCurrentPath(),
                'pageName' => $pageName,
            ]
        );
    }
}
