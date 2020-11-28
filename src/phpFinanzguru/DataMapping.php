<?php

namespace bwater\phpFinanzguru;

final class DataMapping
{

    const NAME = 'name';
    const TITLE = 'title';
    const TYPE = 'type';

    private static array $mapping
        = [
            'Buchungstag'                                            => [
                self::NAME  => 'date',
                self::TITLE => 'Buchungstag',
                self::TYPE  => 'string',
            ],
            'Referenzkonto'                                          => [
                self::NAME  => 'account',
                self::TITLE => 'Referenzkonto',
                self::TYPE  => 'string',
            ],
            'Name Referenzkonto'                                     => [
                self::NAME  => 'accountName',
                self::TITLE => 'Name Referenzkonto',
                self::TYPE  => 'string',
            ],
            'Betrag'                                                 => [
                self::NAME  => 'amount',
                self::TITLE => 'Betrag',
                self::TYPE  => 'decimal',
            ],
            'Kontostand'                                             => [
                self::NAME  => 'accountBalance',
                self::TITLE => 'Kontostand',
                self::TYPE  => 'decimal',
            ],
            'Waehrung'                                               => [
                self::NAME  => 'currency',
                self::TITLE => 'Währung',
                self::TYPE  => 'string',
            ],
            'Beguenstigter/Auftraggeber'                             => [
                self::NAME  => 'client',
                self::TITLE => 'Auftraggeber',
                self::TYPE  => 'string',
            ],
            'IBAN Beguenstigter/Auftraggeber'                        => [
                self::NAME  => 'clientIBAN',
                self::TITLE => 'IBAN-Auftraggeber',
                self::TYPE  => 'string',
            ],
            'Verwendungszweck'                                       => [
                self::NAME  => 'purpose',
                self::TITLE => 'Verwendungszweck',
                self::TYPE  => 'string',
            ],
            'E-Ref'                                                  => [
                self::NAME  => 'eReference',
                self::TITLE => 'E-Ref',
                self::TYPE  => 'string',
            ],
            'Mandatsreferenz'                                        => [
                self::NAME  => 'mandateReference',
                self::TITLE => 'Mandatsreferenz',
                self::TYPE  => 'string',
            ],
            'Glaeubiger-ID'                                          => [
                self::NAME  => 'creditorId',
                self::TITLE => 'Gläubiger-ID',
                self::TYPE  => 'string',
            ],
            'Analyse-Hauptkategorie'                                 => [
                self::NAME  => 'mainCategory',
                self::TITLE => 'Analyse-Hauptkategorie',
                self::TYPE  => 'string',
            ],
            'Analyse-Unterkategorie'                                 => [
                self::NAME  => 'subCategory',
                self::TITLE => 'Analyse-Unterkategorie',
                self::TYPE  => 'string',
            ],
            'Analyse-Vertrag'                                        => [
                self::NAME  => 'contract',
                self::TITLE => 'Analyse-Vertrag',
                self::TYPE  => 'bool',
            ],
            'Analyse-Vertragsturnus'                                 => [
                self::NAME  => 'contractPeriod',
                self::TITLE => 'Vertragsturnus',
                self::TYPE  => 'string',
            ],
            'Analyse-Vertrags-ID'                                    => [
                self::NAME  => 'contractId',
                self::TITLE => 'Vertrags-ID',
                self::TYPE  => 'int',
            ],
            'Analyse-Umbuchung'                                      => [
                self::NAME  => 'isRebooking',
                self::TITLE => 'Umbuchung',
                self::TYPE  => 'bool',
            ],
            'Analyse-Vom frei verfuegbaren Einkommen ausgeschlossen' => [
                self::NAME  => 'isExcluded',
                self::TITLE => 'Vom frei verfügbaren Einkommen ausgeschlossen',
                self::TYPE  => 'bool',
            ],
            'Analyse-Umsatzart'                                      => [
                self::NAME  => 'type',
                self::TITLE => 'Umsatzartz',
                self::TYPE  => 'string',
            ],
            'Analyse-Betrag'                                         => [
                self::NAME  => 'state',
                self::TITLE => 'Status',
                self::TYPE  => 'string',
            ],
            'Analyse-Woche'                                          => [
                self::NAME  => 'week',
                self::TITLE => 'Woche',
                self::TYPE  => 'string',
            ],
            'Analyse-Monat'                                          => [
                self::NAME  => 'month',
                self::TITLE => 'Monat',
                self::TYPE  => 'string',
            ],
            'Analyse-Quartal'                                        => [
                self::NAME  => 'quartal',
                self::TITLE => 'Quartal',
                self::TYPE  => 'string',
            ],
            'Analyse-Jahr'                                           => [
                self::NAME  => 'year',
                self::TITLE => 'Jahr',
                self::TYPE  => 'string',
            ]
        ];

    public static function getName(string $keyName): string
    {
        if (array_key_exists($keyName, self::$mapping)) {
            return self::$mapping[$keyName][self::NAME];
        }

        return '';
    }

    public static function getType(string $keyName): string
    {
        if (array_key_exists($keyName, self::$mapping)) {
            return self::$mapping[$keyName][self::TYPE];
        }

        return '';
    }
}