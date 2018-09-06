<?php

namespace FidelAPI\Resources;

use FidelAPI\FidelAPI;
use FidelAPI\FidelResponse;
use FidelAPI\Models\Card;
use FidelAPI\Models\Location;

class LocationsResource extends FidelResource
{
    /**
     * @param string $cardId
     *
     * @return FidelResponse
     */
    public function get(string $cardId)
    {
        $resource = '/locations/' . $cardId;

        return $this->fidelAPI->call($resource)->processItems(Location::class);
    }

    /**
     * @param string $programId
     *
     * @return FidelResponse
     */
    public function list(string $programId)
    {
        $resource = '/programs/' . $programId . '/locations';

        return $this->fidelAPI->call($resource)->processItems(Location::class);
    }
}
