<?php declare(strict_types=1);

namespace bwater\phpFinanzguru;

final class DataMapping implements DataMappingInterface
{
    private static ?DataMapping $instance = null;

    public const FIELD_NAME = 'name';
    public const FIELD_TITLE = 'title';
    public const FIELD_TYPE = 'type';

    public const TYPE_STRING = 'string';
    public const TYPE_DECIMAL = 'decimal';
    public const TYPE_BOOL = 'bool';
    public const TYPE_INT = 'int';

    private static array $transactionTypes = [];

    private static array $fields
        = [
            'Buchungstag'                                            => [
                self::FIELD_NAME  => 'date',
                self::FIELD_TITLE => 'Buchungstag',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Referenzkonto'                                          => [
                self::FIELD_NAME  => 'account',
                self::FIELD_TITLE => 'Referenzkonto',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Name Referenzkonto'                                     => [
                self::FIELD_NAME  => 'accountName',
                self::FIELD_TITLE => 'Name Referenzkonto',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Betrag'                                                 => [
                self::FIELD_NAME  => 'amount',
                self::FIELD_TITLE => 'Betrag',
                self::FIELD_TYPE  => self::TYPE_DECIMAL,
            ],
            'Kontostand'                                             => [
                self::FIELD_NAME  => 'accountBalance',
                self::FIELD_TITLE => 'Kontostand',
                self::FIELD_TYPE  => self::TYPE_DECIMAL,
            ],
            'Waehrung'                                               => [
                self::FIELD_NAME  => 'currency',
                self::FIELD_TITLE => 'Währung',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Beguenstigter/Auftraggeber'                             => [
                self::FIELD_NAME  => 'client',
                self::FIELD_TITLE => 'Auftraggeber',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'IBAN Beguenstigter/Auftraggeber'                        => [
                self::FIELD_NAME  => 'clientIBAN',
                self::FIELD_TITLE => 'IBAN-Auftraggeber',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Verwendungszweck'                                       => [
                self::FIELD_NAME  => 'purpose',
                self::FIELD_TITLE => 'Verwendungszweck',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'E-Ref'                                                  => [
                self::FIELD_NAME  => 'eReference',
                self::FIELD_TITLE => 'E-Ref',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Mandatsreferenz'                                        => [
                self::FIELD_NAME  => 'mandateReference',
                self::FIELD_TITLE => 'Mandatsreferenz',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Glaeubiger-ID'                                          => [
                self::FIELD_NAME  => 'creditorId',
                self::FIELD_TITLE => 'Gläubiger-ID',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Hauptkategorie'                                 => [
                self::FIELD_NAME  => 'mainCategory',
                self::FIELD_TITLE => 'Hauptkategorie',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Unterkategorie'                                 => [
                self::FIELD_NAME  => 'subCategory',
                self::FIELD_TITLE => 'Unterkategorie',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Vertrag'                                        => [
                self::FIELD_NAME  => 'contract',
                self::FIELD_TITLE => 'Vertrag',
                self::FIELD_TYPE  => self::TYPE_BOOL,
            ],
            'Analyse-Vertragsturnus'                                 => [
                self::FIELD_NAME  => 'contractPeriod',
                self::FIELD_TITLE => 'Vertragsturnus',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Vertrags-ID'                                    => [
                self::FIELD_NAME  => 'contractId',
                self::FIELD_TITLE => 'Vertrags-ID',
                self::FIELD_TYPE  => self::TYPE_INT,
            ],
            'Analyse-Umbuchung'                                      => [
                self::FIELD_NAME  => 'rebooking',
                self::FIELD_TITLE => 'Umbuchung',
                self::FIELD_TYPE  => self::TYPE_BOOL,
            ],
            'Analyse-Vom frei verfuegbaren Einkommen ausgeschlossen' => [
                self::FIELD_NAME  => 'excluded',
                self::FIELD_TITLE => 'Ausgeschlossen',
                self::FIELD_TYPE  => self::TYPE_BOOL,
            ],
            'Analyse-Umsatzart'                                      => [
                self::FIELD_NAME  => 'transactionType',
                self::FIELD_TITLE => 'Transaktionstyp',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Betrag'                                         => [
                self::FIELD_NAME  => 'transactionState',
                self::FIELD_TITLE => 'Transaktionsstatus',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Woche'                                          => [
                self::FIELD_NAME  => 'week',
                self::FIELD_TITLE => 'Woche',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Monat'                                          => [
                self::FIELD_NAME  => 'month',
                self::FIELD_TITLE => 'Monat',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Quartal'                                        => [
                self::FIELD_NAME  => 'quartal',
                self::FIELD_TITLE => 'Quartal',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ],
            'Analyse-Jahr'                                           => [
                self::FIELD_NAME  => 'year',
                self::FIELD_TITLE => 'Jahr',
                self::FIELD_TYPE  => self::TYPE_STRING,
            ]
        ];

    private function __construct() {}

    private function __clone() {}

    public static function getInstance(): DataMappingInterface
    {
        if (self::$instance === null) {
            self::$instance = new DataMapping();
        }

        return self::$instance;
    }

    public function getFieldName(string $keyName): string
    {
        if (array_key_exists($keyName, self::$fields)) {
            return self::$fields[$keyName][self::FIELD_NAME];
        }

        return '';
    }

    public function getFieldType(string $keyName): string
    {
        if (array_key_exists($keyName, self::$fields)) {
            return self::$fields[$keyName][self::FIELD_TYPE];
        }

        return '';
    }

    public function hasTransactionType(string $type = ''): bool
    {
        if(in_array($type, self::$transactionTypes, true)) {
            return true;
        }

        return false;
    }

    public function addTransactionType(string $type = ''): bool
    {
        if(!$this->hasTransactionType($type)) {
            self::$transactionTypes[] = $type;
            return true;
        }

        return false;
    }

    public function getTransactionTypesAsAttributes(): array
    {
        $collection = [];
        foreach(self::$transactionTypes as $type) {
            $attribute = new Attribute('transactionType', $type);
            $collection[] = $attribute;
        }
        return $collection;
    }
}