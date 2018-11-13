<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Set;

class SetTest extends TestCase
{
    public function testItShouldAllowToCreateEmptySet()
    {
        $setUnderTest = new Set();

        $actual = $setUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToPushNewItem()
    {
        $setUnderTest = new Set();
        $dummyItem = 1;

        $setUnderTest->push($dummyItem);
        $actual = $setUnderTest->isEmpty();
        $this->assertFalse($actual);
    }

    public function testItShouldContainsUniqueItems()
    {
        $setUnderTest = new Set();
        $dummyItem = 1;
        $duplicatedDummyItem = 1;

        $setUnderTest->push($dummyItem);
        $setUnderTest->push($duplicatedDummyItem);

        $empty = $setUnderTest->isEmpty();
        $this->assertFalse($empty);

        $count = $setUnderTest->count();
        $this->assertSame(1, $count);
    }

    public function testItShouldAllowToCheckIfContainsItem()
    {
        $setUnderTest = new Set();
        $dummyItem = 1;

        $setUnderTest->push($dummyItem);
        $ifContain = $setUnderTest->contain($dummyItem);
        $ifNotContain = $setUnderTest->contain(0);

        $this->assertTrue($ifContain);
        $this->assertFalse($ifNotContain);
    }

    public function testItShouldAllowToClearSet()
    {
        $setUnderTest = new Set();
        $dummyItem = 1;

        $setUnderTest->push($dummyItem);
        $setUnderTest->clear();

        $actual = $setUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}