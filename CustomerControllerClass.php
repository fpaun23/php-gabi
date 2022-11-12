<?php

require_once ('./db/PdoConnectionClass.php');

class CustomerControllerClass {

    private $connection;

    public function __construct() {

        $this->connection = new PdoConnectionClass();
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