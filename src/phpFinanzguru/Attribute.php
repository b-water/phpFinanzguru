<?php declare(strict_types=1);

namespace bwater\phpFinanzguru;

final class Attribute implements AttributeInterface
{
    private string $name = '';
    private string $value = '';

    public function __construct(string $name, string $value)
    {
        $this->setName($name);
        $this->setValue($value);
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }
}