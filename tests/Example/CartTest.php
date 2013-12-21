<?php
class CartTest extends \PHPUnit_Framework_TestCase
{
    public function testCartIsInitiallyEmpty()
    {
        $cart = new \Example\Cart();
        $this->assertEquals(0, $cart->count());
    }
}
