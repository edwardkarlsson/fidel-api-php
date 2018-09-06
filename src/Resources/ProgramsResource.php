<?php

namespace FidelAPI\Resources;

use FidelAPI\FidelAPI;
use FidelAPI\FidelResponse;
use FidelAPI\Models\Card;
use FidelAPI\Models\Program;
use FidelAPI\Models\Transaction;

class ProgramsResource extends FidelResource
{
    /**
     * @param string $programId
     *
     * @return FidelResponse
     */
    public function get(string $programId)
    {
        $resource = '/programs/' . $programId;

        return $this->fidelAPI->call($resource)->processItems(Program::class);
    }

    /**
     * @return FidelResponse
     */
    public function list()
    {
        $resource = '/programs';

        return $this->fidelAPI->call($resource)->processItems(Program::class);
    }
}
