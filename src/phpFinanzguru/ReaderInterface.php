<?php declare(strict_types = 1);

namespace bwater\phpFinanzguru;

use PhpOffice\PhpSpreadsheet\Spreadsheet;

interface ReaderInterface
{
    /**
     * ReaderInterface constructor.
     *
     * @param string $file
     */
    public function __construct(string $file = '');

    /**
     * @return Spreadsheet
     */
    public function getSpreadsheet(): Spreadsheet;

    /**
     * @return array
     */
    public function getSheetDataArray(): array;


    /**
     * @return $this
     */
    public function setCollection(): self;

    /**
     * @return array
     */
    public function getCollection(): CollectionInterface;
}