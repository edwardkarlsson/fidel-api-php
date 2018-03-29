<?php

namespace FidelAPI;

use FidelAPI\Exceptions\InvalidTokenException;
use GuzzleHttp\Client;

class FidelAPI
{
    public $apiKey;

    /**
     * @var Client
     */
    private $client;

    public function __construct(string $apiKey = null, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    public function __destruct()
    {

    }

    public function call($url, $params)
    {

        return $result;
    }


    public function log($msg) {
        if($this->debug) error_log($msg);
    }
}
