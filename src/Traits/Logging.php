<?php

namespace FidelAPI\Traits;

use Illuminate\Support\Facades\Log;

trait Logging
{
    public function log($message)
    {
        if (config('fidel-api.debug')) {
            Log::debug($message);
        }
    }
}
