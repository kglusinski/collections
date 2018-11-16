<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\DefaultCollectionIterator;
use Webkonstruktor\Collection\Set;

class SetTest extends TestCase
{
    /** @var Set */
    private $setUnderTest;

    public function setUp()
    {
        $iterator = new DefaultCollectionIterator();
        $this->setUnderTest = new Set($iterator);
    }

    public function testItShouldAllowToCreateEmptySet()
    {
        $actual = $this->setUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function testItShouldAllowToPushNewItem()
    {
        $dummyItem = 1;

        $this->setUnderTest->push($dummyItem);
        $actual = $this->setUnderTest->isEmpty();
        $this->assertFalse($actual);
    }

    public function testItShouldContainsUniqueItems()
    {
        $dummyItem = 1;
        $duplicatedDummyItem = 1;

        $this->setUnderTest->push($dummyItem);
        $this->setUnderTest->push($duplicatedDummyItem);

        $empty = $this->setUnderTest->isEmpty();
        $this->assertFalse($empty);

        $count = $this->setUnderTest->count();
        $this->assertSame(1, $count);
    }

    public function testItShouldAllowToCheckIfContainsItem()
    {
        $dummyItem = 1;

        $this->setUnderTest->push($dummyItem);
        $ifContain = $this->setUnderTest->contain($dummyItem);
        $ifNotContain = $this->setUnderTest->contain(0);

        $this->assertTrue($ifContain);
        $this->assertFalse($ifNotContain);
    }

    public function testItShouldAllowToClearSet()
    {
        $dummyItem = 1;

        $this->setUnderTest->push($dummyItem);
        $this->setUnderTest->clear();

        $actual = $this->setUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}