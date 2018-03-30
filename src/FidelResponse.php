<?php

namespace FidelAPI;

use FidelAPI\Models\Card;
use Illuminate\Support\Collection;

class FidelResponse
{
    private $resource;
    private $status;
    private $execution;
    private $items;

    /**
     * FidelResponse constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->items = $data->items;
        $this->resource = $data->resource;
        $this->status = $data->status;
        $this->execution = $data->execution;
    }

    /**
     * @return bool
     */
    public function success()
    {
        return in_array($this->status, [200, 201, 204]);
    }

    /**
     * @return array
     */
    public function items()
    {
        return $this->items;
    }

    /**
     * @return string
     */
    public function resource(): string
    {
        return $this->resource;
    }

    /**
     * @return int
     */
    public function statusCode(): int
    {
        return $this->status;
    }

    /**
     * @return float
     */
    public function executionTime(): float
    {
        return $this->execution;
    }

    /**
     * @param $class
     *
     * @return $this
     */
    public function processItems($class)
    {
        foreach ($this->items as $key => $item) {
            $this->items[$key] = (new $class())->make($item);
        }

        return $this;
    }
}
