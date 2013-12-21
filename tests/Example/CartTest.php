<?php
class CartTest extends \PHPUnit_Framework_TestCase
{
    public function testCartIsInitiallyEmpty()
    {
        $cart = new \Example\Cart();
        $this->assertEquals(0, $cart->count());
    }

    public function testCanAddOneProductToCart()
    {
        $cart = new \Example\Cart();
        $cart->addItem(new \Example\Product());
        $this->assertEquals(1, $cart->count());
    }

    public function testCanAddManyProductsToCart()
    {
        $cart = new \Example\Cart();
        $cart->addItem(new \Example\Product());
        $cart->addItem(new \Example\Product());
        $cart->addItem(new \Example\Product());
        $this->assertEquals(3, $cart->count());
    }
}
