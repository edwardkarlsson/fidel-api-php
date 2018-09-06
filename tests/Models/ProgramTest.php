<?php

namespace FidelAPI\Tests\Models;

use FidelAPI\Models\Program;
use FidelAPI\Tests\FidelAPITestCase;

class ProgramTest extends FidelAPITestCase
{
    public function testBasicTest()
    {
        $payload = [
            'accountId' => $this->faker->uuid,
            'activeDate' => '2018-03-05T12:34:21.585Z',
            'created' => '2018-03-05T12:34:21.585Z',
            'name' => $this->faker->company,
            'live' => false,
            'active' => true,
            'updated' => '2018-03-05T12:34:21.585Z',
            'sync' => false,
            'id' => $this->faker->uuid
        ];

        $program = (new Program())->make($payload);

        foreach ($payload as $key => $value) {
            $this->assertEquals($program->$key, $payload[$key]);
        }
    }
}
