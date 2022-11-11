<?php

class PdoConnectionClass
{

    private $host;
    private $username;
    private $password;
    private $dbname;

    private function connect()
    {

        $this->host = "localhost";
        $this->dbname = "dev_nest";
        $this->username = "root";
        $this->password = "";

        try {

            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;
            $conn = new PDO($dsn, $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            echo 'Connected successfully<br>';

            return $conn;

        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function get(string $tableName): array
    {

        $query = "SELECT * FROM $tableName";

        $result = $this->connect()->query($query);

        return $result->fetchAll();
    }

    public function update(string $tableName, array $updateData): bool
    {

        switch ($tableName) {

            case 'customer':
                $query = "UPDATE $tableName SET email = '$updateData[1]' WHERE id = $updateData[0]";
                break;
            case 'products':
                $query = "UPDATE $tableName SET id_cat = $updateData[1], name_prod = '$updateData[1]' WHERE id_prod = $updateData[0]";
                break;
            case 'category':
                $query = "UPDATE $tableName SET name_cat = '$updateData[1]' WHERE id_cat = $updateData[0]";
                break;
            case 'colors':
                $query = "UPDATE $tableName SET color = '$updateData[1]' WHERE id_color = $updateData[0]";
                break;
            case 'dimensions':
                $query = "UPDATE $tableName SET value = $updateData[1] WHERE id_dimension = $updateData[0]";
                break;
            case 'orders':
                $query = "UPDATE $tableName SET delivery_type = '$updateData[1]', customer_id = $updateData[2], products_id = $updateData[3] WHERE id = $updateData[0]";
                break;
            case 'product_color_dimension':
                $query = "UPDATE $tableName SET id_product = $updateData[1], id_color = $updateData[2], id_dimension = $updateData[3] WHERE id = $updateData[0]";
        }

        $result = $this->connect()->query($query);

        return (bool)$result->rowCount();
    }

    public function insert(string $tableName, array $insertData): bool
    {

        switch ($tableName) {

            case 'customer':
                $query = "INSERT INTO $tableName (email, created_at) VALUES('$insertData[0]', '$insertData[1]')";
                break;
            case 'products':
                $query = "INSERT INTO $tableName (id_cat, name_prod, created_at) VALUES($insertData[0], '$insertData[1]', '$insertData[2]')";
                break;
            case 'category':
                $query = "INSERT INTO $tableName (name_cat, created_at) VALUES('$insertData[0]', '$insertData[1]')";
                break;
            case 'colors':
                $query = "INSERT INTO $tableName (color) VALUES('$insertData[0]')";
                break;
            case 'dimensions':
                $query = "INSERT INTO $tableName (value) VALUES($insertData[0])";
                break;
            case 'orders':
                $query = "INSERT INTO $tableName (delivery_type, customer_id, products_id) VALUES('$insertData[0]', $insertData[1], $insertData[2])";
                break;
            case 'product_color_dimension':
                $query = "INSERT INTO $tableName (id_product, id_color, id_dimension) VALUES($insertData[0], $insertData[1], $insertData[2])";
                break;
        }

        try {

            $result = $this->connect()->query($query);
        } catch (Exception) {

            return false;
        }

        return (bool)$result->rowCount();
    }

    public function delete(string $tableName, int $recordld): bool
    {

        switch ($tableName) {

            case 'customer':
                $query = "DELETE FROM $tableName WHERE id = $recordld";
                break;
            case 'products':
                $query = "DELETE FROM $tableName WHERE id_prod = $recordld";
                break;
            case 'category':
                $query = "DELETE FROM $tableName WHERE id_cat = $recordld";
                break;
            case 'colors':
                $query = "DELETE FROM $tableName WHERE id_color = $recordld";
                break;
            case 'dimensions':
                $query = "DELETE FROM $tableName WHERE id_dimension = $recordld";
                break;
            case 'orders':
                $query = "DELETE FROM $tableName WHERE id = $recordld";
                break;
            case 'product_color_dimension':
                $query = "DELETE FROM $tableName WHERE id = $recordld";
                break;
        }

        $result = $this->connect()->query($query);

        return (bool)$result->rowCount();
    }
}