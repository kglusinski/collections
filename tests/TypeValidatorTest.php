<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\DefaultCollectionIterator;
use Webkonstruktor\Collection\Queue;
use Webkonstruktor\Collection\Stack;
use Webkonstruktor\Collection\DefaultTypeValidator;
use Webkonstruktor\Collection\TypeValidator;

class TypeValidatorTest extends TestCase
{
    private $defaultIterator;

    public function setUp()
    {
        $this->defaultIterator = new DefaultCollectionIterator();
    }

    public function testItShouldValidateTypes()
    {
        $validatorUnderTest = new DefaultTypeValidator();

        $failedValidation = $validatorUnderTest->validate(1, TypeValidator::TYPE_STRING);
        $successValidation = $validatorUnderTest->validate(1, TypeValidator::TYPE_INT);
        $failedObjectValidation = $validatorUnderTest->validate(new Queue($this->defaultIterator), Stack::class);
        $successObjectValidation = $validatorUnderTest->validate(new Queue($this->defaultIterator), Queue::class);

        $this->assertFalse($failedValidation);
        $this->assertFalse($failedObjectValidation);
        $this->assertTrue($successValidation);
        $this->assertTrue($successObjectValidation);
    }
}