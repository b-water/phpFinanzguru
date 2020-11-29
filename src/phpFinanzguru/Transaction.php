<?php declare(strict_types=1);

namespace bwater\phpFinanzguru;

final class Transaction implements TransactionInterface
{
    private DataMappingInterface $mapping;

    public function __construct(
        array $keys,
        array $values,
        DataMappingInterface $mapping
    ) {
        $this->mapping = $mapping;
        $this->setProperties($keys, $values);
    }

    public function setProperties(array $fields, array $values): void
    {
        foreach ($fields as $i => $key) {
            $source = $fields[$i];
            $name   = $this->mapping->getFieldName($source);
            $type   = $this->mapping->getFieldType($source);

            $this->setProperty($name, $values[$i], $type);
        }
    }

    public function setProperty(
        string $name = '',
        $value = '',
        string $type = ''
    ): bool {
        if ($this->hasProperty($name)) {
            return false;
        }
        switch ($type) {
            case DataMapping::TYPE_INT:
                $value = (int)$value;
                break;
            case DataMapping::TYPE_DECIMAL:
                $value = (float)$value;
                break;
            case DataMapping::TYPE_STRING:
                $value = (string)$value;
                break;
            case DataMapping::TYPE_BOOL:
                if ($value === 'nein') {
                    $value = false;
                } elseif ($value === 'ja') {
                    $value = true;
                }
                break;
            default:
                $value = null;
                break;
        }

        $this->{$name} = $value;

        return true;
    }

    public function hasProperty(string $name = ''): bool
    {
        if (property_exists($this, $name)) {
            return true;
        }

        return false;
    }
}