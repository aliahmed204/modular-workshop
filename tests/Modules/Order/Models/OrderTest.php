<?php

namespace Tests\Modules\Order\Models;

use Tests\TestCase;

class OrderTest extends TestCase
{
    public function it_creates_an_order()
    {
        $order = new Order();
        dump($order);
        $this->assertTrue(true);

    }
}
