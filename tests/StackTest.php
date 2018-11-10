<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
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

        $stackUnderTest->add($dummyItem);
        $actual = $stackUnderTest->isEmpty();

        $this->assertFalse($actual);
    }

    public function testItShouldAllowToCountItems()
    {
        $stackUnderTest = new Stack();
        $dummyItem = 231;

        $stackUnderTest->add($dummyItem);
        $actual = $stackUnderTest->count();

        $this->assertSame(1, $actual);
    }

    public function testItShouldAllowToPopLastAddedItemAndDecreaseItems()
    {
        $stackUnderTest = new Stack();
        $dummyItem = 231;
        $dummyLastItem = 321;

        $stackUnderTest->add($dummyItem);
        $stackUnderTest->add($dummyLastItem);
        $size = $stackUnderTest->count();

        $this->assertSame(2, $size);

        $actual = $stackUnderTest->pop();

        $this->assertSame($dummyLastItem, $actual);
        $newSize = $stackUnderTest->count();
        $this->assertSame(1, $newSize);
    }
}