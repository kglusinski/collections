<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Exception\EmptyCollectionException;
use Webkonstruktor\Collection\Stack;

class StackTest extends TestCase
{
    public function testItCanAllowCreateEmptyStack()
    {
        $stackUnderTest = new Stack();

        $actual = $stackUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToAddNewItem()
    {
        $stackUnderTest = new Stack();
        $dummyItem = 231;

        $stackUnderTest->push($dummyItem);
        $actual = $stackUnderTest->isEmpty();

        $this->assertFalse($actual);
    }

    public function testItShouldAllowToCountItems()
    {
        $stackUnderTest = new Stack();
        $dummyItem = 231;

        $stackUnderTest->push($dummyItem);
        $actual = $stackUnderTest->count();

        $this->assertSame(1, $actual);
    }

    public function testItShouldAllowToPopLastAddedItemAndDecreaseItems()
    {
        $stackUnderTest = new Stack();
        $dummyItem = 231;
        $dummyLastItem = 321;

        $stackUnderTest->push($dummyItem);
        $stackUnderTest->push($dummyLastItem);
        $size = $stackUnderTest->count();

        $this->assertSame(2, $size);

        $actual = $stackUnderTest->pop();

        $this->assertSame($dummyLastItem, $actual);
        $newSize = $stackUnderTest->count();
        $this->assertSame(1, $newSize);
    }

    public function testItShouldThrowExceptionOnGettingItemFromEmptyStack()
    {
        $this->expectException(EmptyCollectionException::class);
        $stackUnderTest = new Stack();

        $stackUnderTest->pop();
    }

    public function testItShouldCanBeCleared()
    {
        $stackUnderTest = new Stack();
        $dummyItem = 1;

        $stackUnderTest->push($dummyItem);
        $stackUnderTest->clear();

        $actual = $stackUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}