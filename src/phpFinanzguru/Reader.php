<?php

namespace bwater\phpFinanzguru;

use Exception;
use InvalidArgumentException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Throwable;
use TypeError;

final class Reader implements ReaderInterface
{
    private Spreadsheet $spreadsheet;
    private array $sheetDataArray = [];

    public function __construct(string $file = '')
    {
        if ('' === $file) {
            throw new InvalidArgumentException('file param is empty');
        }

        if ( ! file_exists($file)) {
            throw new InvalidArgumentException('file: ' . $file
                                               . ' doesnt exist');
        }

        try {
            $reader = IOFactory::createReaderForFile($file);
            $reader->setReadDataOnly(true);
            $this->spreadsheet = $reader->load($file);
        } catch (Throwable $t) {
            throw $t;
        }

        if (!$this->getSpreadsheet() instanceof Spreadsheet) {
            throw new TypeError('spreadsheet could not be loaded!');
        }

        if (count($this->getSheetDataArray()) === 0) {
            throw new Exception('no data given could be extracted from import file');
        }
    }

    public function getSpreadsheet(): Spreadsheet
    {
        return $this->spreadsheet;
    }

    public function getSheetDataArray(): array
    {
        if (count($this->sheetDataArray) > 0) {
            return $this->sheetDataArray;
        }

        return $this->sheetDataArray = $this->spreadsheet->getActiveSheet()->toArray();
    }

    public function parse(): array
    {
        $data = $this->getSheetDataArray();

        // extract the keys
        $keys = $data[0];
        $rowsToParse = (count($data)-1);

        $collection = [];
        for ($i = 1; $i < $rowsToParse; $i++) {
            $transaction = new Transaction($keys, $data[$i]);
            $collection[] = $transaction;
        }

        return $collection;
    }
}
