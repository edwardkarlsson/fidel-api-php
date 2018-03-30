<?php

namespace FidelAPI\Resources;

use FidelAPI\FidelAPI;

abstract class FidelResource
{
    /**
     * @var FidelAPI
     */
    protected $fidelAPI;

    public function __construct(FidelAPI $fidelAPI)
    {
        $this->fidelAPI = $fidelAPI;
    }
}
