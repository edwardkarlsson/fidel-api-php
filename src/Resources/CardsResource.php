<?php

namespace FidelAPI\Resources;

use FidelAPI\FidelAPI;
use FidelAPI\FidelResponse;
use FidelAPI\Models\Card;

class CardsResource
{
    /**
     * @var FidelAPI
     */
    private $fidelAPI;

    public function __construct(FidelAPI $fidelAPI)
    {
        $this->fidelAPI = $fidelAPI;
    }

    /**
     * @param string $cardId
     *
     * @return FidelResponse
     */
    public function get(string $cardId)
    {
        $resource = '/cards/' . $cardId;

        return $this->fidelAPI->call($resource)->processItems(Card::class);
    }

    /**
     * @param string $programId
     *
     * @return FidelResponse
     */
    public function list(string $programId)
    {
        $resource = '/programs/' . $programId . '/cards';

        return $this->fidelAPI->call($resource)->processItems(Card::class);
    }
}
