<?php declare(strict_types=1);

namespace bwater\Tests;

use bwater\phpFinanzguru\Attribute;
use bwater\phpFinanzguru\AttributeInterface;
use bwater\phpFinanzguru\Collection;
use bwater\phpFinanzguru\Transaction;
use bwater\phpFinanzguru\TransactionInterface;
use PHPUnit\Framework\TestCase;

final class CollectionTest extends TestCase
{
    private $prophet;

    protected function setUp(): void
    {
        $this->prophet = new \Prophecy\Prophet;
    }

    public function testSetTransactions(): void
    {
        $transaction = $this->prophet->prophesize(TransactionInterface::class);
        $collection = new Collection();
        $collection->setTransactions($transaction->reveal(), $transaction->reveal(), $transaction->reveal());
        $result = $collection->getTransactions();
        $this->assertCount(3, $result);
    }

    public function testSetTransactionTypes(): void
    {
        $attribute = $this->prophet->prophesize(AttributeInterface::class);
        $collection = new Collection();
        $collection->setTransactionTypes($attribute->reveal(), $attribute->reveal(), $attribute->reveal());
        $result = $collection->getTransactionTypes();
        $this->assertCount(3, $result);
    }
}