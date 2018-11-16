<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\DefaultCollectionIterator;
use Webkonstruktor\Collection\DefaultTypeValidator;
use Webkonstruktor\Collection\Exception\InvalidElementTypeException;
use Webkonstruktor\Collection\Queue;
use Webkonstruktor\Collection\TypedStack;
use Webkonstruktor\Collection\TypeValidator;

class TypedStackTest extends TestCase
{
    /** @var TypedStack */
    private $stackUnderTest;
    private $validator;
    private $iterator;

    public function setUp()
    {
        $this->validator = new DefaultTypeValidator();
        $this->iterator = new DefaultCollectionIterator();
        $this->stackUnderTest = new TypedStack(TypeValidator::TYPE_INT, $this->validator, $this->iterator);
    }

    public function testItShouldAllowToCreateEmptyStack()
    {
        $current = $this->stackUnderTest->isEmpty();

        $this->assertTrue($current);
    }

    public function testItShouldAllowToAddOnlyOneTypeElements()
    {
        $dummyCorrectTypeItem = 1;

        $this->stackUnderTest->push($dummyCorrectTypeItem);

        $empty = $this->stackUnderTest->isEmpty();
        $this->assertFalse($empty);

        $this->expectException(InvalidElementTypeException::class);
        $dummyIncorrectTypeItem = 'item';
        $this->stackUnderTest->push($dummyIncorrectTypeItem);
    }

    public function testItShouldAllowAddClassTypeElements()
    {
        $stackUnderTest = new TypedStack(Queue::class, $this->validator, $this->iterator);
        $classCorrectTypeItem = new Queue($this->iterator);

        $stackUnderTest->push($classCorrectTypeItem);

        $empty = $stackUnderTest->isEmpty();
        $this->assertFalse($empty);
    }
}