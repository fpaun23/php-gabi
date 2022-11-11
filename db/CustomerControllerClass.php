<?php

require_once ('PdoConnectionClass.php');

class CustomerControllerClass {

    public function get() : array {

        return (new PdoConnectionClass)->get('customer');
    }

    public function update(array $updateData) : bool {

        return (new PdoConnectionClass)->update('customer', $updateData);
    }

    public function insert(array $insertData) : bool {

        return (new PdoConnectionClass)->insert('customer', $insertData);
    }

    public function delete(int $recordld) : bool {

        return (new PdoConnectionClass)->delete('customer', $recordld);
    }
}