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

    /**
     * @param AttributeInterface ...$transactionTypes
     */
    public function setTransactionTypes(AttributeInterface ...$transactionTypes): void;

    /**
     * @return array
     */
    public function getTransactionTypes(): array;

    /**
     * @param AttributeInterface ...$accounts
     *
     * @return $this
     */
    public function setAccounts(AttributeInterface ...$accounts): self;

    /**
     * @return array
     */
    public function getAccounts(): array;
}