<?php

namespace bwater\phpFinanzguru;

final class Mapping {

    const KEY_NAME = 'name';
    const KEY_TITLE = 'title';

    private static array $keys = [
        'Buchungstag' => [
            self::KEY_NAME  => 'date',
            self::KEY_TITLE => 'Buchungstag'
        ],
        'Referenzkonto' => [
            self::KEY_NAME  => 'account',
            self::KEY_TITLE => 'Referenzkonto'
        ],
        'Name Referenzkonto' => [
            self::KEY_NAME  => 'accountName',
            self::KEY_TITLE => 'Name Referenzkonto'
        ],
        'Betrag' => [
            self::KEY_NAME  => 'amount',
            self::KEY_TITLE => 'Betrag'
        ],
        'Kontostand' => [
            self::KEY_NAME  => 'accountBalance',
            self::KEY_TITLE => 'Kontostand'
        ],
        'Waehrung' => [
            self::KEY_NAME  => 'currency',
            self::KEY_TITLE => 'Währung'
        ],
        'Beguenstigter/Auftraggeber' => [
            self::KEY_NAME  => 'client',
            self::KEY_TITLE => 'Auftraggeber'
        ],
        'IBAN Beguenstigter/Auftraggeber' => [
            self::KEY_NAME  => 'clientIBAN',
            self::KEY_TITLE => 'IBAN-Auftraggeber'
        ],
        'Verwendungszweck' => [
            self::KEY_NAME  => 'purpose',
            self::KEY_TITLE => 'Verwendungszweck'
        ],
        'E-Ref' => [
            self::KEY_NAME  => 'eReference',
            self::KEY_TITLE => 'E-Ref'
        ],
        'Mandatsreferenz' => [
            self::KEY_NAME  => 'mandateReference',
            self::KEY_TITLE => 'Mandatsreferenz'
        ],
        'Glaeubiger-ID' => [
            self::KEY_NAME  => 'creditorId',
            self::KEY_TITLE => 'Gläubiger-ID'
        ],
        'Analyse-Hauptkategorie' => [
            self::KEY_NAME  => 'mainCategory',
            self::KEY_TITLE => 'Analyse-Hauptkategorie'
        ],
        'Analyse-Unterkategorie' => [
            self::KEY_NAME  => 'subCategory',
            self::KEY_TITLE => 'Analyse-Unterkategorie'
        ],
        'Analyse-Vertrag' => [
            self::KEY_NAME  => 'contract',
            self::KEY_TITLE => 'Analyse-Vertrag'
        ],
        'Analyse-Vertragsturnus' => [
            self::KEY_NAME  => 'contractPeriod',
            self::KEY_TITLE => 'Vertragsturnus'
        ],
        'Analyse-Vertrags-ID' => [
            self::KEY_NAME  => 'contractId',
            self::KEY_TITLE => 'Vertrags-ID'
        ],
        'Analyse-Umbuchung' => [
            self::KEY_NAME  => 'isRebooking',
            self::KEY_TITLE => 'Umbuchung'
        ],
        'Analyse-Vom frei verfuegbaren Einkommen ausgeschlossen' => [
            self::KEY_NAME  => 'excluded',
            self::KEY_TITLE => 'Vom frei verfügbaren Einkommen ausgeschlossen'
        ],
        'Analyse-Umsatzart' => [
            self::KEY_NAME  => 'type',
            self::KEY_TITLE => 'Umsatzartz'
        ],
        'Analyse-Betrag' => [
            self::KEY_NAME  => 'state',
            self::KEY_TITLE => 'Status'
        ],
        'Analyse-Woche' => [
            self::KEY_NAME  => 'week',
            self::KEY_TITLE => 'Woche'
        ],
        'Analyse-Monat' => [
            self::KEY_NAME  => 'month',
            self::KEY_TITLE => 'Monat'
        ],
        'Analyse-Quartal' => [
            self::KEY_NAME  => 'quartal',
            self::KEY_TITLE => 'Quartal'
        ],
        'Analyse-Jahr' => [
            self::KEY_NAME  => 'year',
            self::KEY_TITLE => 'Jahr'
        ]
    ];

    public static function getKeyName(string $keyName) {
        if(array_key_exists($keyName, self::$keys)) {
            return self::$keys[$keyName][self::KEY_NAME];
        }

    }
}