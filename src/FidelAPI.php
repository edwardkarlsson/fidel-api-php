<?php

namespace FidelAPI;

use FidelAPI\Resources\BrandsResource;
use FidelAPI\Resources\CardsResource;
use FidelAPI\Resources\LocationsResource;
use FidelAPI\Resources\ProgramsResource;
use FidelAPI\Resources\TransactionsResource;
use GuzzleHttp\Client;

class FidelAPI
{
    /**
     * @var string
     */
    public $apiKey;

    /**
     * @var Client
     */
    private $client;

    /**
     * @var array
     */
    private $brands;

    /**
     * @var CardsResource
     */
    private $cards;

    /**
     * @var ProgramsResource
     */
    private $programs;

    /**
     * @var TransactionsResource
     */
    private $transactions;

    /**
     * @var LocationsResource
     */
    private $locations;

    public function __construct(string $apiKey = null, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;

        $this->brands = new BrandsResource($this);
        $this->cards = new CardsResource($this);
        $this->locations = new LocationsResource($this);
        $this->programs = new ProgramsResource($this);
        $this->transactions = new TransactionsResource($this);
    }

    public function call($resource, $params = [])
    {
        $url = $this->getUrl($resource);
        $headers = $this->getHeaders();

        $content = $this->client
            ->get($url, ['headers' => $headers])
            ->getBody()
            ->getContents();

        return new FidelResponse(json_decode($content));
    }

    /**
     * @return BrandsResource
     */
    public function brands(): BrandsResource
    {
        return $this->brands;
    }

    /**
     * @return CardsResource
     */
    public function cards(): CardsResource
    {
        return $this->cards;
    }

    /**
     * @return LocationsResource
     */
    public function locations(): LocationsResource
    {
        return $this->locations;
    }

    /**
     * @return ProgramsResource
     */
    public function programs(): ProgramsResource
    {
        return $this->programs;
    }

    /**
     * @return TransactionsResource
     */
    public function transactions(): TransactionsResource
    {
        return $this->transactions;
    }

    /**
     * @return array
     */
    private function getHeaders(): array
    {
        $headers = [
            'Content-Type' => 'application/json',
            'Fidel-Key' => config('fidel-api.token')
        ];
        return $headers;
    }

    /**
     * @param $resource
     *
     * @return string
     */
    private function getUrl($resource): string
    {
        return config('fidel-api.base_url') . $resource;
    }
}
