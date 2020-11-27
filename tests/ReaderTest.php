<?php declare(strict_types = 1);

namespace bwater\Tests;

use bwater\phpFinanzguru\Reader;
use bwater\phpFinanzguru\TransactionInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PHPUnit\Framework\TestCase;

final class ReaderTest extends TestCase
{
    const FILE = 'buchungen.xlsx';

    public function testConstruct(): void
    {
        $reader = new Reader(realpath('.') . '/' . self::FILE);
        $this->assertInstanceOf(Spreadsheet::class, $reader->getSpreadsheet());

        $collection = $reader->parse();
        $this->assertIsArray($collection);
        $this->assertNotEmpty($collection);
        $this->assertInstanceOf(TransactionInterface::class, $collection[0]);
    }
}
