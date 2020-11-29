<?php declare(strict_types=1);

namespace bwater\Tests;

use bwater\phpFinanzguru\Attribute;
use PHPUnit\Framework\TestCase;

final class AttributeTest extends TestCase
{
    private $prophet;

    protected function setUp(): void
    {
        $this->prophet = new \Prophecy\Prophet;
    }

    public function testConstruct(): void
    {
        $name = 'foobar';
        $value = uniqid('', true);
        $attribute = new Attribute($name, $value);
        $this->assertSame($name, $attribute->getName());
        $this->assertSame($value, $attribute->getValue());
    }
}