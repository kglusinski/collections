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
}