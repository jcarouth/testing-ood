<?php
namespace Example;

/**
 * Product
 *
 * A product sold in the store.
 */
class Product
{
    /** @var int */
    private $price;

    public function __construct($price = 0)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}
