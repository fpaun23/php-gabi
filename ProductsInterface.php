<?php

interface ProductsInterface
{
    public function setPrice(int $newPrice): void;

    public function setName(string $newName): void;

    public function getPrice(): int;

    public function getName(): string;
}
