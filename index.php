<?php

require_once('ProductController.php');
require_once('CustomerControllerClass.php');
require_once('./db/MysqliConnectionClass.php');
require_once('./db/PdoConnectionClass.php');

echo "Type of connections are:<br>1)Pdo<br>2)Mysqli<br>";

$CustomerControllerObjPdoConnection = new CustomerControllerClass(new PdoConnectionClass());
$CustomerControllerObjMysqliConnection = new CustomerControllerClass(new MysqliConnectionClass());

if ($CustomerControllerObjMysqliConnection->update([1, 'dobritaandreigabriel@yahoo.com'])) {
    echo "Customer with id 1 succesfully update his email: dobritaandreigabriel@yahoo.com<br>";
}

if ($CustomerControllerObjPdoConnection->update([1, 'dobritaandreigabriel@gmail.com'])) {
    echo "Customer with id 1 succesfully update his email: dobritaandreigabriel@gmail.com<br>";
}

if ($CustomerControllerObjMysqliConnection->insert(['gabyz@gmail.com', date("h:i:sa")])) {
    echo "A new customer was insered<br>";
}

if ($CustomerControllerObjPdoConnection->insert(['decanz@gmail.com', date("h:i:sa")])) {
    echo "A new customer was insered<br>";
}

if ($CustomerControllerObjPdoConnection->delete(35)) {
    echo "A customer was deleted<br>";
}

if ($CustomerControllerObjPdoConnection->delete(32)) {
    echo "A customer was deleted<br>";
}
