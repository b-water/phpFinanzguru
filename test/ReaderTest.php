<?php declare(strict_types = 1);

namespace bwater\Tests;

use bwater\phpFinanzguru\CollectionInterface;
use bwater\phpFinanzguru\Reader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PHPUnit\Framework\TestCase;

final class ReaderTest extends TestCase
{
    public string $file = '';

    public function setUp(): void
    {
        parent::setUp();
        $this->file = realpath('.') . '/' . 'transactions.xlsx';
    }

    public function testConstruct(): void
    {
        if (!file_exists($this->file)) {
            $this->markTestSkipped('Test can only run with Import File');
        }

        $reader = new Reader($this->file);
        $this->assertInstanceOf(Spreadsheet::class, $reader->getSpreadsheet());

        $collection = $reader->getCollection();
        $this->assertInstanceOf(CollectionInterface::class, $collection);
        $this->assertNotEmpty($collection->getTransactions());
        $this->assertNotEmpty($collection->getTransactionTypes());
    }
}
