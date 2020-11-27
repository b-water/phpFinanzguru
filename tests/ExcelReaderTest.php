<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru\Tests;

use bwater\phpFinanzguru\Excel\Reader;
use PHPUnit\Framework\TestCase;

final class ExcelReaderTest extends TestCase
{
    const FILE = 'buchungen.xlsx';

    public function testConstruct(): void
    {
        echo getcwd();
        $file = file_get_contents(self::FILE);

        $excelReader = new Reader($file);
    }
}