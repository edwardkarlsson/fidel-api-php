<?php

namespace FidelAPI;

use FidelAPI\Exceptions\InvalidTokenException;
use FidelAPI\Resources\CardsResource;
use GuzzleHttp\Client;

class FidelAPI
{
    public $apiKey;

    /**
     * @var Client
     */
    private $client;
    private $cards;

    public function __construct(string $apiKey = null, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;

        $this->cards = new CardsResource($this);
    }

    public function __destruct()
    {

    }

    public function call($resource, $params = [])
    {
        $url = config('fidel-api.base_url') . $resource;

        $headers = [
            'Content-Type' => 'application/json',
            'Fidel-Key' => config('fidel-api.token')
        ];

        $content = $this->client->get($url, ['headers' => $headers])->getBody()->getContents();

        return new FidelResponse(json_decode($content));
    }

    public function log($msg) {
        if($this->debug) error_log($msg);
    }

    public function cards()
    {
        return $this->cards;
    }
}
