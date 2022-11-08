<?php

include 'Product.php';

class ProductController {

    public function manageProduct($money) {

        $my_product = new Product();
        $my_product->setPrice($money);
        $my_product->printPrice();
    }
}

$my_product_controller = new ProductController();
$my_product_controller->manageProduct(20);

