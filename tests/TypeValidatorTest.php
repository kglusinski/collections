<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Iterator\CollectionIterator;
use Webkonstruktor\Collection\Iterator\DefaultCollectionIterator;
use Webkonstruktor\Collection\Queue;
use Webkonstruktor\Collection\Stack;
use Webkonstruktor\Collection\Validator\DefaultTypeValidator;
use Webkonstruktor\Collection\Validator\TypeValidator;

class TypeValidatorTest extends TestCase
{
    /** @var CollectionIterator */
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