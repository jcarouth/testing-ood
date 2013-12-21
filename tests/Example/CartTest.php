<?php
class CartTest extends \PHPUnit_Framework_TestCase
{
    private $cart;

    public function setUp()
    {
        $this->cart = new \Example\Cart();
    }

    public function tearDown()
    {
        $this->cart = null;
    }

    public function testCartIsInitiallyEmpty()
    {
        $this->assertEquals(0, $this->cart->count());
    }

    public function testCanAddOneProductToCart()
    {
        $this->cart->addItem(new \Example\Product());
        $this->assertEquals(1, $this->cart->count());
    }

    public function testCanAddManyProductsToCart()
    {
        $this->cart->addItem(new \Example\Product());
        $this->cart->addItem(new \Example\Product());
        $this->cart->addItem(new \Example\Product());
        $this->assertEquals(3, $this->cart->count());
    }
}
