<?php

interface DbConnectionInterface {

    public function connect();

    public function get(string $tableName): array;

    public function update(string $tableName, array $updateData): bool;

    public function insert(string $tableName, array $insertData): bool;

    public function delete(string $tableName, int $recordld): bool;

}