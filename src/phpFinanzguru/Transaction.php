<?php

namespace bwater\phpFinanzguru;

final class Transaction implements TransactionInterface
{
    private array $keys = [];
    private array $values = [];

    public function __construct(array $keys, array $values) {
        $this->setAttributes($keys, $values);
    }

    public function setKeys(array $keys): self {

        foreach($keys as $i => $key) {
            $this->keys[] = Mapping::getKeyName($key);
        }

        return $this;
    }

    public function setValues(array $values): self {
        $this->values = $values;
        return $this;
    }

    public function setAttributes(array $keys, array $values) {
        $this->setKeys($keys)->setValues($values);
        $attributes = array_combine($this->keys, $this->values);

        foreach($attributes as $key => $value) {
            $this->{$key} = $value;
        }
    }
}