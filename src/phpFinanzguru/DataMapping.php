<?php declare(strict_types=1);

namespace bwater\phpFinanzguru;

final class DataMapping implements DataMappingInterface
{
    private static ?DataMapping $instance = null;

    public const FIELD_NAME = 'name';
    public const FIELD_TITLE = 'title';
    public const FIELD_TYPE = 'type';
    public const FIELD_USE_ATTRIBUTE = 'useAttribute';

    public const TYPE_STRING = 'string';
    public const TYPE_DECIMAL = 'decimal';
    public const TYPE_BOOL = 'bool';
    public const TYPE_INT = 'int';

    public const FIELD_DATE = 'Buchungstag';
    public const FIELD_ACCOUNT = 'Referenzkonto';
    public const FIELD_ACCOUNT_NAME = 'Name Referenzkonto';
    public const FIELD_AMOUNT = 'Betrag';
    public const FIELD_ACCOUNT_BALANCE = 'Kontostand';
    public const FIELD_CURRENCY = 'Waehrung';
    public const FIELD_CLIENT = 'Beguenstigter/Auftraggeber';
    public const FIELD_CLIENT_IBAN = 'IBAN Beguenstigter/Auftraggeber';
    public const FIELD_PURPOSE = 'Verwendungszweck';
    public const FIELD_EREF = 'E-Ref';
    public const FIELD_MANDATE_REFERENCE = 'Mandatsreferenz';
    public const FIELD_CREDITOR_ID = 'Glaeubiger-ID';
    public const FIELD_MAIN_CATEGORY = 'Analyse-Hauptkategorie';
    public const FIELD_SUB_CATEGORY = 'Analyse-Unterkategorie';
    public const FIELD_CONTRACT = 'Analyse-Vertrag';
    public const FIELD_CONTRACT_PERIOD = 'Analyse-Vertragsturnus';
    public const FIELD_CONTRACT_ID = 'Analyse-Vertrags-ID';
    public const FIELD_REBOOKING = 'Analyse-Umbuchung';
    public const FIELD_EXCLUDED = 'Analyse-Vom frei verfuegbaren Einkommen ausgeschlossen';
    public const FIELD_TRANSACTION_TYPE = 'Analyse-Umsatzart';
    public const FIELD_TRANSACTION_STATE = 'Analyse-Betrag';
    public const FIELD_WEEK = 'Analyse-Woche';
    public const FIELD_MONTH = 'Analyse-Monat';
    public const FIELD_QUARTAL = 'Analyse-Quartal';
    public const FIELD_YEAR = 'Analyse-Jahr';


    private static array $transactionTypes = [];
    private static array $accounts = [];

    private array $fields = [];

    private function __construct()
    {
        $this->fields = $this->getDefaultFields();
    }

    private function __clone()
    {
    }

    public static function getInstance(): DataMappingInterface
    {
        if (self::$instance === null) {
            self::$instance = new DataMapping();
        }

        return self::$instance;
    }

    public function getDefaultFields(): array
    {
        $defaultFields                                = [];
        $defaultFields[self::FIELD_DATE]              = [
            self::FIELD_NAME          => 'date',
            self::FIELD_TITLE         => 'Buchungstag',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_ACCOUNT]           = [
            self::FIELD_NAME          => 'account',
            self::FIELD_TITLE         => 'Referenzkonto',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_ACCOUNT_NAME]      = [
            self::FIELD_NAME          => 'accountName',
            self::FIELD_TITLE         => 'Name Referenzkonto',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_AMOUNT]            = [
            self::FIELD_NAME          => 'amount',
            self::FIELD_TITLE         => 'Betrag',
            self::FIELD_TYPE          => self::TYPE_DECIMAL,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_ACCOUNT_BALANCE]   = [
            self::FIELD_NAME          => 'accountBalance',
            self::FIELD_TITLE         => 'Kontostand',
            self::FIELD_TYPE          => self::TYPE_DECIMAL,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CURRENCY]          = [
            self::FIELD_NAME          => 'currency',
            self::FIELD_TITLE         => 'Währung',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CLIENT]            = [
            self::FIELD_NAME          => 'client',
            self::FIELD_TITLE         => 'Auftraggeber',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CLIENT_IBAN]       = [
            self::FIELD_NAME          => 'clientIBAN',
            self::FIELD_TITLE         => 'IBAN-Auftraggeber',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_PURPOSE]           = [
            self::FIELD_NAME          => 'purpose',
            self::FIELD_TITLE         => 'Verwendungszweck',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_EREF]              = [
            self::FIELD_NAME          => 'eReference',
            self::FIELD_TITLE         => 'E-Ref',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_MANDATE_REFERENCE] = [
            self::FIELD_NAME          => 'mandateReference',
            self::FIELD_TITLE         => 'Mandatsreferenz',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CREDITOR_ID]       = [
            self::FIELD_NAME          => 'creditorId',
            self::FIELD_TITLE         => 'Gläubiger-ID',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_MAIN_CATEGORY]     = [
            self::FIELD_NAME          => 'mainCategory',
            self::FIELD_TITLE         => 'Hauptkategorie',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_SUB_CATEGORY]      = [
            self::FIELD_NAME          => 'subCategory',
            self::FIELD_TITLE         => 'Unterkategorie',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CONTRACT]          = [
            self::FIELD_NAME          => 'contract',
            self::FIELD_TITLE         => 'Vertrag',
            self::FIELD_TYPE          => self::TYPE_BOOL,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CONTRACT_PERIOD]   = [
            self::FIELD_NAME          => 'contractPeriod',
            self::FIELD_TITLE         => 'Vertragsturnus',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_CONTRACT_ID]       = [
            self::FIELD_NAME          => 'contractId',
            self::FIELD_TITLE         => 'Vertrags-ID',
            self::FIELD_TYPE          => self::TYPE_INT,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_REBOOKING]         = [
            self::FIELD_NAME          => 'rebooking',
            self::FIELD_TITLE         => 'Umbuchung',
            self::FIELD_TYPE          => self::TYPE_BOOL,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_EXCLUDED]
                                                      = [
            self::FIELD_NAME          => 'excluded',
            self::FIELD_TITLE         => 'Ausgeschlossen',
            self::FIELD_TYPE          => self::TYPE_BOOL,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_TRANSACTION_TYPE]  = [
            self::FIELD_NAME          => 'transactionType',
            self::FIELD_TITLE         => 'Transaktionstyp',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => true,
        ];
        $defaultFields[self::FIELD_TRANSACTION_STATE] = [
            self::FIELD_NAME          => 'transactionState',
            self::FIELD_TITLE         => 'Transaktionsstatus',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => true,
        ];
        $defaultFields[self::FIELD_WEEK]              = [
            self::FIELD_NAME          => 'week',
            self::FIELD_TITLE         => 'Woche',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_MONTH]             = [
            self::FIELD_NAME          => 'month',
            self::FIELD_TITLE         => 'Monat',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_QUARTAL]           = [
            self::FIELD_NAME          => 'quartal',
            self::FIELD_TITLE         => 'Quartal',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];
        $defaultFields[self::FIELD_YEAR]              = [
            self::FIELD_NAME          => 'year',
            self::FIELD_TITLE         => 'Jahr',
            self::FIELD_TYPE          => self::TYPE_STRING,
            self::FIELD_USE_ATTRIBUTE => false,
        ];

        return $defaultFields;
    }

    public function getFieldName(string $keyName): string
    {
        $field = $this->getField($keyName);
        if (count($field) > 0) {
            return $field[self::FIELD_NAME];
        }

        return '';
    }

    public function getFieldType(string $keyName): string
    {
        $field = $this->getField($keyName);
        if (count($field) > 0) {
            return $field[self::FIELD_TYPE];
        }

        return '';
    }

    public function getFieldUseAttribute(string $keyName): ?bool
    {
        $field = $this->getField($keyName);
        if (count($field) > 0) {
            return $field[self::FIELD_USE_ATTRIBUTE];
        }

        return null;
    }

    public function getField(string $keyName): array
    {
        if (array_key_exists($keyName, $this->fields)) {
            return $this->fields[$keyName];
        }

        return [];
    }

    public function hasTransactionType(string $type = ''): bool
    {
        if (in_array($type, self::$transactionTypes, true)) {
            return true;
        }

        return false;
    }

    public function addTransactionType(string $type = ''): bool
    {
        if ( ! $this->hasTransactionType($type)) {
            self::$transactionTypes[] = $type;

            return true;
        }

        return false;
    }

    public function getTransactionTypes(bool $asAttribute = false): array
    {
        if ($asAttribute === false) {
            return self::$transactionTypes;
        }

        $collection = [];
        foreach (self::$transactionTypes as $type) {
            $attribute    = new Attribute('transactionType', $type);
            $collection[] = $attribute;
        }

        return $collection;
    }

    public function hasAccount(string $account = ''): bool
    {
        if (in_array($account, self::$accounts, true)) {
            return true;
        }

        return false;
    }

    public function addAccount(string $ref = '', string $name = ''): bool
    {
        if ( ! $this->hasAccount($ref)) {
            self::$accounts[$ref] = $name;

            return true;
        }

        return false;
    }

    public function getAccounts(bool $asAttribute = false): array
    {
        if ($asAttribute === false) {
            return self::$accounts;
        }

        $collection = [];
        foreach (self::$accounts as $key => $value) {
            $attribute    = new Attribute((string) $key, $value);
            $collection[] = $attribute;
        }

        return $collection;
    }
}