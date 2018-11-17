<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Iterator\DefaultCollectionIterator;
use Webkonstruktor\Collection\Iterator\DefaultTypeValidator;
use Webkonstruktor\Collection\Exception\EmptyCollectionException;
use Webkonstruktor\Collection\Queue;

class QueueTest extends TestCase
{
    private $queueUnderTest;

    public function setUp()
    {
        $iterator = new DefaultCollectionIterator();
        $this->queueUnderTest = new Queue($iterator);
    }

    public function testItCanAllowCreateEmptyQueue()
    {
        $actual = $this->queueUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToAddNewItem()
    {
        $dummyItem = 1;

        $this->queueUnderTest->push($dummyItem);

        $empty = $this->queueUnderTest->isEmpty();
        $this->assertFalse($empty);

        $count = $this->queueUnderTest->count();
        $this->assertSame(1, $count);
    }

    public function testItShouldAllowToGetFirstItem()
    {
        $dummyItemFirst = 1;
        $dummyItemSecond = 2;

        $this->queueUnderTest->push($dummyItemFirst);
        $this->queueUnderTest->push($dummyItemSecond);

        $empty = $this->queueUnderTest->isEmpty();
        $this->assertFalse($empty);

        $count = $this->queueUnderTest->count();
        $this->assertSame(2, $count);

        $actual = $this->queueUnderTest->pop();
        $this->assertSame($dummyItemFirst, $actual);

        $count = $this->queueUnderTest->count();
        $this->assertSame(1, $count);
    }

    public function testItShouldThrowExceptionIfTryToGetFromEmptyQueue()
    {
        $this->expectException(EmptyCollectionException::class);

        $actual = $this->queueUnderTest->pop();
    }

    public function testItShouldCanBeCleared()
    {
        $dummyItemFirst = 1;
        $dummyItemSecond = 2;

        $this->queueUnderTest->push($dummyItemFirst);
        $this->queueUnderTest->push($dummyItemSecond);

        $this->queueUnderTest->clear();

        $actual = $this->queueUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}