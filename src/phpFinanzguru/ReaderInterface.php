<?php

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
     * @return array
     */
    public function parse(): array;

    /**
     * @param TransactionInterface ...$collection
     *
     * @return $this
     */
    public function setCollection(TransactionInterface ...$collection): self;

    /**
     * @return array
     */
    public function getCollection(): array;
}