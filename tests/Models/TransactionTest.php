<?php

namespace FidelAPI\Tests\Models;

use FidelAPI\Models\Transaction;
use FidelAPI\Tests\FidelAPITestCase;

class TransactionTest extends FidelAPITestCase
{
    public function testBasicTest()
    {
        $payload = [
            'currency' => 'GBP',
            'midId' => $this->faker->uuid,
            'time' => '2018-03-26T14:50:42.065Z',
            'city' => $this->faker->city,
            'date' => '2018-03-26T14:50:42.065Z',
            'programId' => $this->faker->uuid,
            'id' => $this->faker->uuid,
            'scheme' => $this->faker->randomElement(['visa', 'mastercard']),
            'postcode' => $this->faker->postcode,
            'accountId' => $this->faker->uuid,
            'countryCode' => 'GBR',
            'created' => '2018-03-26T14:50:42.065Z',
            'address' => $this->faker->streetAddress,
            'live' => false,
            'cardId' => $this->faker->uuid,
            'lastNumbers' => '4001',
            'updated' => '2018-03-26T14:50:42.065Z',
            'firstNumbers' => '444400',
            'brandId' => $this->faker->uuid,
            'amount' => $this->faker->randomNumber(3),
            'cleared' => false,
            'locationId' => $this->faker->uuid,
            'wallet' => 'undefined',
            'type' => $this->faker->randomElement(['visa', 'mastercard']),
            'merchantId' => $this->faker->randomNumber(6),
        ];

        $transaction = (new Transaction())->make($payload);

        foreach ($payload as $key => $value) {
            $this->assertEquals($transaction->$key, $payload[$key]);
        }
    }
}
