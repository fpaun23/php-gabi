<?php

require_once ('./db/DbConnectionInterface.php');
require_once ('./db/PdoConnectionClass.php');
require_once ('./db/MysqliConnectionClass.php');

class CustomerControllerClass {

    private DbConnectionInterface $connection;

    public function __construct(DbConnectionInterface $typeOfConnection) {

        $this->connection = $typeOfConnection;
    }

    public function get() : array {

        return $this->connection->get('customer');
    }

    public function update(array $updateData) : bool {

        return $this->connection->update('customer', $updateData);
    }

    public function insert(array $insertData) : bool {

        return $this->connection->insert('customer', $insertData);
    }

    public function delete(int $recordld) : bool {

        return $this->connection->delete('customer', $recordld);
    }
}