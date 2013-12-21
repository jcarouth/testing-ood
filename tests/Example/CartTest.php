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

    public function testCartIsACountableObject()
    {
        $this->assertInstanceOf('Countable', $this->cart);
    }

    public function testCartIsInitiallyEmpty()
    {
        $this->assertEquals(0, count($this->cart));
    }

    public function testCanAddOneProductToCart()
    {
        $this->cart->addItem(new \Example\Product());
        $this->assertEquals(1, count($this->cart));
    }

    public function testCanAddManyProductsToCart()
    {
        $this->cart->addItem(new \Example\Product());
        $this->cart->addItem(new \Example\Product());
        $this->cart->addItem(new \Example\Product());
        $this->assertEquals(3, count($this->cart));
    }
}
