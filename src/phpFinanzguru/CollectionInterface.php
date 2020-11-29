<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru;

interface CollectionInterface
{
    /**
     * @param TransactionInterface ...$collection
     *
     * @return $this
     */
    public function setTransactions(TransactionInterface ...$collection): self;

    /**
     * @return array
     */
    public function getTransactions(): array;
}