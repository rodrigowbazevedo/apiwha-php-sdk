<?php

namespace APIWHA\SDK;

use GuzzleHttp\Client as Guzzle;

class Factory
{
    private $guzzle;

    public function __construct()
    {
        $this->guzzle = new Guzzle;
    }

    public function create(string $apiKey)
    {
        return new Client($apiKey, $this->guzzle);
    }
}