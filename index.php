<?php

require_once ('ProductController.php');
require_once ('.\db\CustomerControllerClass.php');

$productsControllerObj = new ProductController(100, 'Caramida');
$productsControllerObj->manageProduct();

$CustomerControllerObj = new CustomerControllerClass();

/*foreach ($CustomerControllerObj->get() as $row) {

    echo $row['id']." ".$row['email']."<br>";
}*/
echo $CustomerControllerObj->update([1, 'dobritaandreigabriel@gmail.com']);
//echo $CustomerControllerObj->insert(['nouclient@gmail.com', date("h:i:sa")]);
//echo $CustomerControllerObj->delete(10);


