<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Exception\EmptyCollectionException;
use Webkonstruktor\Collection\Queue;

class QueueTest extends TestCase
{
    public function testItCanAllowCreateEmptyQueue()
    {
        $queueUnderTest = new Queue();

        $actual = $queueUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToAddNewItem()
    {
        $queueUnderTest = new Queue();
        $dummyItem = 1;

        $queueUnderTest->push($dummyItem);

        $empty = $queueUnderTest->isEmpty();
        $this->assertFalse($empty);

        $count = $queueUnderTest->count();
        $this->assertSame(1, $count);
    }

    public function testItShouldAllowToGetFirstItem()
    {
        $queueUnderTest = new Queue();
        $dummyItemFirst = 1;
        $dummyItemSecond = 2;

        $queueUnderTest->push($dummyItemFirst);
        $queueUnderTest->push($dummyItemSecond);

        $empty = $queueUnderTest->isEmpty();
        $this->assertFalse($empty);

        $count = $queueUnderTest->count();
        $this->assertSame(2, $count);

        $actual = $queueUnderTest->pop();
        $this->assertSame($dummyItemFirst, $actual);

        $count = $queueUnderTest->count();
        $this->assertSame(1, $count);
    }

    public function testItShouldThrowExceptionIfTryToGetFromEmptyQueue()
    {
        $this->expectException(EmptyCollectionException::class);

        $queueUnderTest = new Queue();
        $actual = $queueUnderTest->pop();
    }

    public function testItShouldCanBeCleared()
    {
        $queueUnderTest = new Queue();
        $dummyItemFirst = 1;
        $dummyItemSecond = 2;

        $queueUnderTest->push($dummyItemFirst);
        $queueUnderTest->push($dummyItemSecond);

        $queueUnderTest->clear();

        $actual = $queueUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}