<?php

require_once ('ProductController.php');

$productsControllerObj = new ProductController(100, 'Caramida');
$productsControllerObj->manageProduct();
