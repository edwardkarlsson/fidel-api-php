<?php

namespace FidelAPI\Models;

abstract class FidelModel
{
    public function make($dataSet)
    {
        foreach ($dataSet as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }

        return $this;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
