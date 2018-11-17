<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\CollectionIterator;
use Webkonstruktor\Collection\DefaultCollectionIterator;
use Webkonstruktor\Collection\Exception\InvalidElementTypeException;
use Webkonstruktor\Collection\Queue;
use Webkonstruktor\Collection\TypedSet;
use Webkonstruktor\Collection\Validator\DefaultTypeValidator;
use Webkonstruktor\Collection\Validator\TypeValidator;

class TypedSetTest extends TestCase
{
    /** @var TypedSet */
    private $setUnderTest;

    /** @var TypeValidator */
    private $validator;

    /** @var CollectionIterator */
    private $iterator;

    public function setUp()
    {
        $this->validator = new DefaultTypeValidator();
        $this->iterator = new DefaultCollectionIterator();
        $this->setUnderTest = new TypedSet(TypeValidator::TYPE_INT, $this->validator, $this->iterator);
    }

    public function testItShouldAllowToCreateEmptyTypedQueue()
    {
        $actual = $this->setUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToAddOnlyOneTypeElements()
    {
        $dummyCorrectTypeItem = 1;

        $this->setUnderTest->push($dummyCorrectTypeItem);

        $empty = $this->setUnderTest->isEmpty();
        $this->assertFalse($empty);

        $this->expectException(InvalidElementTypeException::class);
        $dummyIncorrectTypeItem = 'item';
        $this->setUnderTest->push($dummyIncorrectTypeItem);
    }

    public function testItShouldAllowAddClassTypeElements()
    {
        $queueUnderTest = new TypedSet(Queue::class, $this->validator, $this->iterator);
        $classCorrectTypeItem = new Queue($this->iterator);

        $queueUnderTest->push($classCorrectTypeItem);

        $empty = $queueUnderTest->isEmpty();
        $this->assertFalse($empty);
    }
}