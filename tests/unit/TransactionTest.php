<?php declare(strict_types=1);

namespace bwater\Tests;

use bwater\phpFinanzguru\DataMapping;
use bwater\phpFinanzguru\DataMappingInterface;
use bwater\phpFinanzguru\Transaction;
use bwater\phpFinanzguru\TransactionInterface;
use PHPUnit\Framework\TestCase;
use Prophecy\Argument;

final class TransactionTest extends TestCase
{
    private $prophet;

    protected function setUp(): void
    {
        $this->prophet = new \Prophecy\Prophet;
    }

    public function testConstruct(): void
    {
        $mapping = $this->prophet->prophesize(DataMappingInterface::class);

        $fields = ['foo', 'bar', 'half-life_3_confirmed', 'question', 'someone', '5', '6', '7'];
        $values = [8, -19.50, 'ja', 'Where was Gondor when the Westfold fell?', 'nein', false, true, -100];

        $mapping->getFieldName($fields[0])->willReturn($fields[0])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[1])->willReturn($fields[1])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[2])->willReturn($fields[2])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[3])->willReturn($fields[3])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[4])->willReturn($fields[4])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[5])->willReturn($fields[5])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[6])->willReturn($fields[6])->shouldBeCalledOnce();
        $mapping->getFieldName($fields[7])->willReturn($fields[7])->shouldBeCalledOnce();

        $mapping->getFieldType($fields[0])->willReturn(DataMapping::TYPE_INT)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[1])->willReturn(DataMapping::TYPE_DECIMAL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[2])->willReturn(DataMapping::TYPE_BOOL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[3])->willReturn(DataMapping::TYPE_STRING)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[4])->willReturn(DataMapping::TYPE_BOOL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[5])->willReturn(DataMapping::TYPE_BOOL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[6])->willReturn(DataMapping::TYPE_BOOL)->shouldBeCalledOnce();
        $mapping->getFieldType($fields[7])->willReturn(DataMapping::TYPE_INT)->shouldBeCalledOnce();

        $transaction = new Transaction($fields, $values, $mapping->reveal());
        $this->assertInstanceOf(TransactionInterface::class, $transaction);
    }
}