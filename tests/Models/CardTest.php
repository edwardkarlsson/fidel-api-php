<?php

namespace FidelAPI\Tests\Models;

use FidelAPI\Tests\FidelAPITestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardTest extends FidelAPITestCase
{
    use DatabaseTransactions;

    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
}
