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

    /** @var Promotion */
    private $promotion;

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
    public function addItem(Sellable $item)
    {
        $this->contents[] = $item;
    }

    /**
     * Sets promotion on cart
     *
     * @return void
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;
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

    public function total()
    {
        $runningTotal = 0;
        foreach ($this->contents as $item) {
            $runningTotal += $this->applyPromotion($item);
        }
        return $runningTotal;
    }

    private function applyPromotion($item)
    {
        if (null === $this->promotion) {
            return $item->getPrice();
        }
        return $this->promotion->applyTo($item);
    }
}
