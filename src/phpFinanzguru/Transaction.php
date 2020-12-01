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
            $source       = $fields[$i];
            $name         = $this->mapping->getFieldName($source);
            $type         = $this->mapping->getFieldType($source);
            $useAttribute = $this->mapping->getFieldUseAttribute($source);

            if ($useAttribute === true) {
                $attribute = new Attribute($name, $values[$i]);
                $this->setProperty($name, $attribute);
            }

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
                if (is_string($value)) {
                    $value = $this->fixStringToBool($value);
                }
                break;
        }

        $this->{$name} = $value;

        return true;
    }

    public function fixStringToBool(string $value): ?bool
    {
        if ($value === 'nein') {
            return false;
        }

        if ($value === 'ja') {
            return true;
        }

        return null;
    }

    public function hasProperty(string $name = ''): bool
    {
        if (property_exists($this, $name)) {
            return true;
        }

        return false;
    }
}