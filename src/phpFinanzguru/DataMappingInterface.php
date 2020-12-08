<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru;

interface DataMappingInterface
{
    /**
     * @return DataMappingInterface
     */
    public static function getInstance(): DataMappingInterface;

    /**
     * @param string $keyName
     *
     * @return array
     */
    public function getField(string $keyName): array;

    /**
     * @param string $keyName
     *
     * @return string
     */
    public function getFieldName(string $keyName): string;

    /**
     * @param string $keyName
     *
     * @return string
     */
    public function getFieldType(string $keyName): string;

    /**
     * @param string $keyName
     *
     * @return bool|null
     */
    public function getFieldUseAttribute(string $keyName): ?bool;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function hasTransactionType(string $type = ''): bool;

    /**
     * @param string $type
     *
     * @return bool
     */
    public function addTransactionType(string $type = ''): bool;

    /**
     * @return array
     */
    public function getTransactionTypes(bool $asAttribute = false): array;
}