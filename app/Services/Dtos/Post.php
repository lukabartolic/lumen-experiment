<?php


namespace App\Services\Dtos;


use Spatie\DataTransferObject\DataTransferObject;

class Post extends DataTransferObject
{
    public int $id;
    public string $title;
    public string $body;
    public int $userId;

    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters);

        // overrides...
    }
}
