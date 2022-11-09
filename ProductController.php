<?php

require_once ('Product.php');

class ProductController {

    private string $name;
    private int $price;

    public function __construct(int $newPrice, string $newName) {

        $this->name = $newName;
        $this->price = $newPrice;
    }

    public function manageProduct() : void {

        $productObj = new Product($this->price, $this->name);
        $productObj->printPriceAndName();
    }
}
