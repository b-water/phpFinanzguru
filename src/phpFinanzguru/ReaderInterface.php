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
     * @return CollectionInterface
     */
    public function parse(): CollectionInterface;

    /**
     * @param CollectionInterface $collection
     *
     * @return $this
     */
    public function setCollection(CollectionInterface $collection): self;

    /**
     * @return array
     */
    public function getCollection(): CollectionInterface;
}