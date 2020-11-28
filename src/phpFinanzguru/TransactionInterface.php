<?php

namespace bwater\phpFinanzguru;

interface TransactionInterface
{
    /**
     * TransactionInterface constructor.
     *
     * @param array $keys
     * @param array $values
     */
    public function __construct(array $keys, array $values);

    /**
     * @param array $keys
     * @param array $values
     */
    public function setAttributes(array $keys, array $values): void;
}