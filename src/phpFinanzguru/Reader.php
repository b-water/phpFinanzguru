<?php declare(strict_types=1);

namespace bwater\phpFinanzguru;

use Exception;
use InvalidArgumentException;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use Throwable;
use TypeError;

final class Reader implements ReaderInterface
{
    private Collection $collection;
    private Spreadsheet $spreadsheet;
    private array $sheetDataArray = [];
    private DataMappingInterface $mapping;

    public function __construct(string $file = '')
    {
        $this->mapping = DataMapping::getInstance();

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

        if ( ! $this->getSpreadsheet() instanceof Spreadsheet) {
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

        return $this->sheetDataArray = $this->spreadsheet->getActiveSheet()
                                                         ->toArray();
    }

    public function setTransaction(
        array $fields,
        array $values,
        DataMappingInterface $mapping
    ): TransactionInterface {
        $transaction = new Transaction($fields, $values, $mapping);

        if ($transaction->hasProperty('transactionType')) {
            $this->mapping->addTransactionType($transaction->transactionType);
        }

        return $transaction;
    }

    public function setCollection(): self
    {
        $data = $this->getSheetDataArray();

        // extract the fields
        $fields = $data[0];
        $items  = (count($data) - 1);

        $transactions = [];
        for ($i = 1; $i < $items; $i++) {
            $transaction = $this->setTransaction($fields, $data[$i],
                $this->mapping);
            $transactions[] = $transaction;
        }

        $collection = new Collection();
        $collection->setTransactions(...$transactions);
        $collection->setTransactionTypes(...
            $this->mapping->getTransactionTypesAsAttributes());

        $this->collection = $collection;

        return $this;
    }

    public function getCollection(): CollectionInterface
    {
        return $this->collection;
    }
}
