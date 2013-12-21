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
        $this->cart->addItem($this->product(300));
        $this->assertEquals(1, count($this->cart));
    }

    public function testCanAddManyProductsToCart()
    {
        $this->cart->addItem($this->product(500));
        $this->cart->addItem($this->product(500));
        $this->cart->addItem($this->product(500));
        $this->assertEquals(3, count($this->cart));
    }

    public function testSubtotalIsSumOfItemPrices()
    {
        $this->cart->addItem($this->product(1500));
        $this->cart->addItem($this->product(2000));
        $this->assertEquals(3500, $this->cart->subtotal());
    }

    private function product($price = 0, $methods = array('getPrice'))
    {
        if (!is_array($methods)) {
            $methods = array();
        }

        $product = $this->getMockBuilder('\\Example\\Product')
            ->setMethods($methods)
            ->getMock();

        if (in_array('getPrice', $methods)) {
            $product->expects($this->any())
                ->method('getPrice')
                ->will($this->returnValue($price));
        }

        return $product;
    }
}
