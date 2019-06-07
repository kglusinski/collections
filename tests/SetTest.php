<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Iterator\DefaultCollectionIterator;
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

    /** @dataProvider setProvider */
    public function testItShouldAllowToCheckIfContainsAllItems($testItems, $valid)
    {
        $items = [1, 2, 3];

        foreach ($items as $item) {
            $this->setUnderTest->push($item);
        }

        $result = $this->setUnderTest->containAll($testItems);

        $this->assertSame($valid, $result);
    }

    public function testItShouldAllowToClearSet()
    {
        $dummyItem = 1;

        $this->setUnderTest->push($dummyItem);
        $this->setUnderTest->clear();

        $actual = $this->setUnderTest->isEmpty();

        $this->assertTrue($actual);
    }

    public function setProvider(): array
    {
        $iterator1 = new DefaultCollectionIterator();
        $collectionContents = new Set($iterator1);
        $collectionContents->push(1);
        $collectionContents->push(2);
        $collectionContents->push(3);

        $iterator2 = new DefaultCollectionIterator();
        $collectionNotContents = new Set($iterator2);
        $collectionNotContents->push(1);
        $collectionNotContents->push(2);
        $collectionNotContents->push(3);
        $collectionNotContents->push(4);

        return [
            'validArray' => [
                'items' => [1, 2, 3],
                'result' => true
            ],
           'invalidArray' => [
                'items' => [1, 2, 3, 4],
                'result' => false
            ],
            'validCollection' => [
                'items' => $collectionContents,
                'result' => true
            ],
            'invalidCollection' => [
                'items' => $collectionNotContents,
                'result' => false
            ]
        ];
    }
}