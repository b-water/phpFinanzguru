<?php declare(strict_types=1);

namespace bwater\phpFinanzguru;

interface AttributeInterface
{
    /**
     * AttributeInterface constructor.
     *
     * @param string $name
     * @param string $value
     */
    public function __construct(string $name, string $value);
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @param string $name
     */
    public function setName(string $name): void;

    /**
     * @return string
     */
    public function getValue(): string;

    /**
     * @param string $value
     */
    public function setValue(string $value): void;
}