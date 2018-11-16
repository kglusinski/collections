<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\DefaultCollectionIterator;
use Webkonstruktor\Collection\Exception\EmptyCollectionException;
use Webkonstruktor\Collection\Stack;

class StackTest extends TestCase
{
    /** @var Stack */
    private $stackUnderTest;

    public function setUp()
    {
        $iterator = new DefaultCollectionIterator();
        $this->stackUnderTest = new Stack($iterator);
    }

    public function testItCanAllowCreateEmptyStack()
    {
        $actual = $this->stackUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToAddNewItem()
    {
        $dummyItem = 231;

        $this->stackUnderTest->push($dummyItem);
        $actual = $this->stackUnderTest->isEmpty();

        $this->assertFalse($actual);
    }

    public function testItShouldAllowToCountItems()
    {
        $dummyItem = 231;

        $this->stackUnderTest->push($dummyItem);
        $actual = $this->stackUnderTest->count();

        $this->assertSame(1, $actual);
    }

    public function testItShouldAllowToPopLastAddedItemAndDecreaseItems()
    {
        $dummyItem = 231;
        $dummyLastItem = 321;

        $this->stackUnderTest->push($dummyItem);
        $this->stackUnderTest->push($dummyLastItem);
        $size = $this->stackUnderTest->count();

        $this->assertSame(2, $size);

        $actual = $this->stackUnderTest->pop();

        $this->assertSame($dummyLastItem, $actual);
        $newSize = $this->stackUnderTest->count();
        $this->assertSame(1, $newSize);
    }

    public function testItShouldThrowExceptionOnGettingItemFromEmptyStack()
    {
        $this->expectException(EmptyCollectionException::class);
        $this->stackUnderTest->pop();
    }

    public function testItShouldCanBeCleared()
    {
        $dummyItem = 1;

        $this->stackUnderTest->push($dummyItem);
        $this->stackUnderTest->clear();

        $actual = $this->stackUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}