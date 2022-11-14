<?php

require_once ('./db/DbConnectionInterface.php');
require_once ('./db/PdoConnectionClass.php');
require_once ('./db/MysqliConnectionClass.php');

class CustomerControllerClass {

    private DbConnectionInterface $connection;

    public function __construct(string $typeOfConnection) {

        try {

            switch ($typeOfConnection) {

                case 'Mysqli':
                    $this->connection = new MysqliConnectionClass();
                    break;
                case 'Pdo':
                    $this->connection = new PdoConnectionClass();
                    break;
                default:
                    throw new Exception('Invalid type of connection!<br>');
                    break;
            }
        }
        catch (Exception $e) {

            echo $e->getMessage();
        }
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