<?php
namespace Example;

/**
 * Cart
 *
 * Represents a storage container for shopper to keep a collection
 * of items he or she wants to purchase.
 */
class Cart implements \Countable
{
    /** @var array */
    private $contents;

    public function __construct()
    {
        $this->contents = array();
    }

    /**
     * Returns the number of items currently in the cart
     *
     * @return int
     */
    public function count()
    {
        return count($this->contents);
    }

    /**
     * Adds an item to the cart
     *
     * @return void
     */
    public function addItem($item)
    {
        $this->contents[] = $item;
    }

    /**
     * Sums the prices of all items for the Cart's subtotal
     *
     * @return int
     */
    public function subtotal()
    {
        $runningTotal = 0;
        foreach ($this->contents as $item) {
            $runningTotal += $item->getPrice();
        }
        return $runningTotal;
    }
}
