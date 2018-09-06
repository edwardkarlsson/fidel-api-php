<?php

namespace FidelAPI\Tests\Models;

use FidelAPI\Models\Brand;
use FidelAPI\Tests\FidelAPITestCase;

class BrandTest extends FidelAPITestCase
{
    public function testCanMakeCardModel()
    {
        $payload = [
            'updated' => '2018-03-26T14:47:36.444Z',
            'accountId' => $this->faker->uuid,
            'created' => '2018-03-26T14:47:36.444Z',
            'id' => $this->faker->uuid,
            'name' => $this->faker->company,
            'live' => false,
            'consent' => true
        ];

        $card = (new Brand())->make($payload);

        foreach ($payload as $key => $value) {
            $this->assertEquals($card->$key, $payload[$key]);
        }
    }
}
