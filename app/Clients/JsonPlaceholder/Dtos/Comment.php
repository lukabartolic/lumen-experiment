<?php


namespace App\Clients\JsonPlaceholder\Dtos;


use Spatie\DataTransferObject\DataTransferObject;

class Comment extends DataTransferObject
{
    protected bool $ignoreMissing = true;

    public int $id;
    public string $name;
    public string $body;
    public int $postId;

    public function __construct(array $parameters = [])
    {
        parent::__construct($parameters);

        // overrides...
    }
}
