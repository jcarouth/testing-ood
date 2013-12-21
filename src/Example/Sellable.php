<?php
namespace Example;

interface Sellable
{
    /**
     * @return int
     */
    public function getPrice();

    /**
     * @return string
     */
    public function getType();
}
