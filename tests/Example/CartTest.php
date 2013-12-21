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

    public function testSubtotalIsSumOfItemPrices()
    {
        $productOne = $this->getMockBuilder('\\Example\\Product')
            ->setMethods(array('getPrice'))
            ->getMock();

        $productOne->expects($this->any())
            ->method('getPrice')
            ->will($this->returnValue(1500));

        $productTwo = $this->getMockBuilder('\\Example\\Product')
            ->setMethods(array('getPrice'))
            ->getMock();

        $productTwo->expects($this->any())
            ->method('getPrice')
            ->will($this->returnValue(2000));

        $this->cart->addItem($productOne);
        $this->cart->addItem($productTwo);
        $this->assertEquals(3500, $this->cart->subtotal());
    }
}
