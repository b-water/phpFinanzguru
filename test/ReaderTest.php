<?php declare(strict_types = 1);

namespace bwater\Tests;

use bwater\phpFinanzguru\Reader;
use bwater\phpFinanzguru\TransactionInterface;
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

        $collection = $reader->setCollection()->getCollection();
        $this->assertIsArray($collection);
        $this->assertNotEmpty($collection);
        $this->assertInstanceOf(TransactionInterface::class, $collection[0]);
    }
}
