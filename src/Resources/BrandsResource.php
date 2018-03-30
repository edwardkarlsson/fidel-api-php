<?php

namespace FidelAPI\Resources;

use FidelAPI\FidelResponse;
use FidelAPI\Models\Brand;

class BrandsResource extends FidelResource
{
    /**
     * @param string $brandId
     *
     * @return FidelResponse
     */
    public function get(string $brandId)
    {
        $resource = '/brands/' . $brandId;

        return $this->fidelAPI->call($resource)->processItems(Brand::class);
    }

    /**
     * @return FidelResponse
     */
    public function list()
    {
        $resource = '/brands';

        return $this->fidelAPI->call($resource)->processItems(Brand::class);
    }
}
