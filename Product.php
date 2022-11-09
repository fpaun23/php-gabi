<?php

require_once ('ProductsInterface.php');

class Product implements ProductsInterface {

    private string $name;
    private int $price;

    public function __construct(int $newPrice, string $newName) {

        $this->price = $newPrice;
        $this->name = $newName;
    }

    public function setPrice(int $newPrice) : void {

        $this->price = $newPrice;
    }
    public function setName(string $newName) : void {

        $this->name = $newName;
    }

    public function getPrice() : int {

        return $this->price;
    }
    public function getName() : string {

        return $this->name;
    }

    public function printPriceAndName() : void {

        echo 'Pretul produsului este '.$this->price."\n";
        echo 'Numele produsului este '.$this->name;
    }
}