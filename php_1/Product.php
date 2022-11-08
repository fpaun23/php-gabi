<?php

include 'ProductsInterface.php';

class Product implements ProductsInterface {

    private $price;

    public function setPrice($money) {

        $this->price = $money;
    }

    public function getPrice() {

        return $this->price;
    }

    public function printPrice() {

        echo $this->price;
    }
}