<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru;

final class Collection implements CollectionInterface
{
    private array $transactions = [];
    private array $transactionTypes = [];
    private array $accounts = [];

    public function setTransactions(TransactionInterface ...$collection): CollectionInterface
    {
        $this->transactions = $collection;
        return $this;
    }

    public function getTransactions(): array
    {
        return $this->transactions;
    }

    public function setTransactionTypes(AttributeInterface ...$transactionTypes): void
    {
        $this->transactionTypes = $transactionTypes;
    }

    public function getTransactionTypes(): array
    {
        return $this->transactionTypes;
    }

    public function setAccounts(AttributeInterface ...$accounts): void
    {
        $this->accounts = $accounts;
    }

    public function getAccounts(): array
    {
        return $this->accounts;
    }
}