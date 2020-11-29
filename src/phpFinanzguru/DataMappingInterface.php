<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru;

interface DataMappingInterface
{
    public static function getInstance(): DataMappingInterface;

    public function getFieldName(string $keyName): string;

    public function getFieldType(string $keyName): string;

    public function hasTransactionType(string $type = ''): bool;

    public function addTransactionType(string $type = ''): bool;

    public function getTransactionTypesAsAttributes(): array;
}