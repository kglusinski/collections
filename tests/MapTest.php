<?php

declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Exception\KeyNotFoundException;
use Webkonstruktor\Collection\Iterator\DefaultCollectionIterator;
use Webkonstruktor\Collection\Map;

class MapTest extends TestCase
{
    public function testItShouldAllowToGetElementForSpecificKey()
    {
        $iterator = new DefaultCollectionIterator();
        $mapUnderTest = new Map($iterator);

        $key = 'example-key';
        $value = 'example-value';

        $mapUnderTest->put($key, $value);

        $this->assertSame($value, $mapUnderTest->get($key));
    }

    public function testItShouldThrowExceptionOnGetNonExistingKey()
    {
        $iterator = new DefaultCollectionIterator();
        $mapUnderTest = new Map($iterator);

        $this->expectException(KeyNotFoundException::class);

        $mapUnderTest->get('notExistingKey');
    }
}