<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru;

interface TransactionInterface
{
    /**
     * TransactionInterface constructor.
     *
     * @param array $fields
     * @param array $values
     */
    public function __construct(array $fields, array $values, DataMappingInterface $mapping);

    /**
     * @param array $fields
     * @param array $values
     */
    public function setProperties(array $fields, array $values): void;

    /**
     * @param string $name
     * @param string $value
     * @param string $type
     */
    public function setProperty(string $name = '', $value = '', string $type = ''): bool;
}