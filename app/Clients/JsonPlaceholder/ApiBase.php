<?php


namespace App\Clients\JsonPlaceholder;


use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class ApiBase
{
    protected Client $client;
    protected string $baseUrl = "https://jsonplaceholder.typicode.com";

    public function __construct()
    {
        $this->client = new Client(["base_uri" => $this->baseUrl]);
    }

    protected function getBodyContents(ResponseInterface $response) {
        return json_decode($response->getBody()->getContents(), true);
    }
}
