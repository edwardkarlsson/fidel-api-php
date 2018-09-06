<?php

namespace FidelAPI\Resources;

use FidelAPI\FidelAPI;
use FidelAPI\FidelResponse;
use FidelAPI\Models\Card;
use FidelAPI\Models\Transaction;

class TransactionsResource extends FidelResource
{
    /**
     * @param string $transactionId
     *
     * @return FidelResponse
     */
    public function get(string $transactionId)
    {
        $resource = '/transactions/' . $transactionId;

        return $this->fidelAPI->call($resource)->processItems(Transaction::class);
    }

    /**
     * @param string $programId
     *
     * @return FidelResponse
     */
    public function list(string $programId)
    {
        $resource = '/programs/' . $programId . '/transactions';

        return $this->fidelAPI->call($resource)->processItems(Transaction::class);
    }
}
