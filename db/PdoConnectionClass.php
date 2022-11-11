<?php

class PdoConnectionClass {

    private $host;
    private $username;
    private $password;
    private $dbname;

    private function connect() {

        $this->host = "localhost";
        $this->dbname = "dev_nest";
        $this->username = "root";
        $this->password = "";

        try {

            $dsn = "mysql:host=".$this->host.";dbname=".$this->dbname;
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            echo 'Connected successfully<br>';

            return $conn;

        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get(string $tableName):array {

        $query = "SELECT * FROM $tableName";

        $result = $this->connect()->query($query);

        return $result->fetchAll();
    }

    public function update(string $tableName, array $updateData) : bool {

        $query = "UPDATE $tableName SET email = '$updateData[1]' WHERE id = $updateData[0]";

        $result = $this->connect()->query($query);

        return (bool) $result->rowCount();
    }

    public function insert(string $tableName, array $insertData) : bool {

        $query = "INSERT INTO $tableName (email, created_at) VALUES('$insertData[0]', '$insertData[1]')";

        try {

            $result = $this->connect()->query($query);
        }
        catch (Exception) {

            return false;
        }

        return (bool) $result->rowCount();
    }

    public function delete(string $tableName, int $recordld) : bool {

        $query = "DELETE FROM $tableName WHERE id = $recordld";

        $result = $this->connect()->query($query);

        return (bool) $result->rowCount();
    }
}