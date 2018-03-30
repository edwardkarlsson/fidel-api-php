<?php

namespace FidelAPI\Tests\Models;

use FidelAPI\Models\Card;
use FidelAPI\Tests\FidelAPITestCase;

class CardTest extends FidelAPITestCase
{
    public function testCanMakeCardModel()
    {
        $payload = [
            'scheme' => $this->faker->randomElement(['visa', 'mastercard']),
            'accountId' => $this->faker->uuid,
            'countryCode' => 'GBR',
            'created' => '2018-03-26T14:50:26.931Z',
            'expYear' => date('Y', strtotime('+ 3 years')),
            'expDate' => '2019-02-01T00:00:00.000Z',
            'firstNumbers' => '444400',
            'live' => false,
            'lastNumbers' => '4001',
            'expMonth' => (int) $this->faker->month,
            'updated' => '2018-03-26T14:50:26.931Z',
            'metadata' => null,
            'programId' => $this->faker->uuid,
            'id' => $this->faker->uuid,
            'type' => $this->faker->randomElement(['visa', 'mastercard']),
        ];

        $card = (new Card())->make($payload);

        foreach ($payload as $key => $value) {
            $this->assertEquals($card->$key, $payload[$key]);
        }
    }
}
