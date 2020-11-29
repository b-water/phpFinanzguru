<?php declare(strict_types=1);

namespace bwater\Tests;

use bwater\phpFinanzguru\DataMapping;
use bwater\phpFinanzguru\DataMappingInterface;
use bwater\phpFinanzguru\Transaction;
use bwater\phpFinanzguru\TransactionInterface;
use PHPUnit\Framework\TestCase;

final class TransactionTest extends TestCase
{
    public function testConstruct(): void
    {
        $mapping = $this->prophesize(DataMappingInterface::class);

        $fields = ['foo', 'bar', 'half-life_3_confirmed', 'question'];
        $values = [8, -19.50, true, 'Where was Gondor when the Westfold fell?'];

        $mapping->getFieldName($fields[0])->willReturn($fields[0])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[1])->willReturn($fields[1])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[2])->willReturn($fields[2])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[3])->willReturn($fields[3])->shouldBeCalledOnce();

        $mapping->getFieldType($fields[0])->willReturn(DataMapping::TYPE_INT)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[1])->willReturn(DataMapping::TYPE_DECIMAL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[2])->willReturn(DataMapping::TYPE_BOOL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[3])->willReturn(DataMapping::TYPE_STRING)->shouldBeCalledOnce();


        $transaction = new Transaction($fields, $values, $mapping->reveal());
        $this->assertInstanceOf(TransactionInterface::class, $transaction);
    }
}