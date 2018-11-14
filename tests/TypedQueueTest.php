<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Exception\InvalidElementTypeException;
use Webkonstruktor\Collection\Queue;
use Webkonstruktor\Collection\TypedQueue;
use Webkonstruktor\Collection\TypeValidator;

class TypedQueueTest extends TestCase
{
    private $queueUnderTest;
    private $validator;

    public function setUp()
    {
        /** @var TypeValidator|MockObject $validator */
        $this->validator = new TypeValidator();
        $this->queueUnderTest = new TypedQueue(TypedQueue::TYPE_INT, $this->validator);
    }

    public function testItShouldAllowToCreateEmptyTypedQueue()
    {
        $actual = $this->queueUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToAddOnlyOneTypeElements()
    {
        $dummyCorrectTypeItem = 1;

        $this->queueUnderTest->push($dummyCorrectTypeItem);

        $empty = $this->queueUnderTest->isEmpty();
        $this->assertFalse($empty);

        $this->expectException(InvalidElementTypeException::class);
        $dummyIncorrectTypeItem = 'item';
        $this->queueUnderTest->push($dummyIncorrectTypeItem);
    }

    public function testItShouldAllowAddClassTypeElements()
    {
        $queueUnderTest = new TypedQueue(Queue::class, $this->validator);
        $classCorrectTypeItem = new Queue();

        $queueUnderTest->push($classCorrectTypeItem);

        $empty = $queueUnderTest->isEmpty();
        $this->assertFalse($empty);
    }

}