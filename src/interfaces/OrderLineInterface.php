<?php namespace browner12\money\interfaces;

interface OrderLineInterface {

    /**
     * get the quantity of a product being ordered
     *
     * @return int
     */
    public function getQuantity();

    /**
     * get the unit price of a product being ordered
     *
     * @return \browner12\money\Money
     */
    public function getUnitPrice();
}