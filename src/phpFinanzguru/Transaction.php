<?php

namespace bwater\phpFinanzguru;

final class Transaction implements TransactionInterface
{
    public function __construct(array $keys, array $values)
    {
        $this->setAttributes($keys, $values);
    }

    public function setAttributes(array $keys, array $values): void
    {
        foreach ($keys as $i => $key) {
            $source = $keys[$i];
            $key    = DataMapping::getName($source);
            $type   = DataMapping::getType($source);

            switch ($type) {
                case 'int':
                    $value = (int)$values[$i];
                    break;
                case 'decimal':
                    $value = (float)$values[$i];
                    break;
                case 'string':
                    $value = (string)$values[$i];
                    break;
                case 'bool':
                    if ($values[$i] === 'nein') {
                        $value = false;
                    } elseif ($values[$i] === 'ja') {
                        $value = true;
                    }
                    break;
                default:
                    $value = null;
                    break;
            }

            $this->{$key} = $value;
        }
    }
}