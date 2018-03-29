<?php

namespace FidelAPI\Models;

use FidelAPI\Traits\Logging;

class FidelModel
{
    use Logging;

    public function make($dataSet)
    {
        list($foundProperties, $notFoundProperties) = collect($dataSet)->partition(function ($value, $key) {
            return property_exists($this, $key);
        });

        $foundProperties->each(function ($value, $key) {
            $this->$key = $value;
        });

        $notFoundProperties->each(function ($value, $key) {
            $this->log('Property [' . $key . '] does not exist on the [' . class_basename($this) . '] model.');
        });

        return $this;
    }
}
