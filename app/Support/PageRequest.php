<?php


namespace App\Support;


class PageRequest
{
    private static int $perPage;
    private static int $page;
    private static ?string $sortBy;
    private static ?string $sortDirection;

    public static function set(int $perPage, int $page, ?string $sortBy = null, ?string $sortDirection = null)
    {
        self::$perPage = $perPage;
        self::$page = $page;
        self::$sortBy = ($sortBy != null) ? $sortBy : "id";
        self::$sortDirection = ($sortDirection != null) ? $sortDirection : "asc";

        return new static;
    }

    /**
     * @return int
     */
    public static function getPerPage(): int
    {
        return self::$perPage;
    }

    /**
     * @return int
     */
    public static function getPage(): int
    {
        return self::$page;
    }

    /**
     * @return string|null
     */
    public static function getSortBy(): ?string
    {
        return self::$sortBy;
    }

    /**
     * @return string|null
     */
    public static function getSortDirection(): ?string
    {
        return self::$sortDirection;
    }
}
