<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;

class StackTest extends TestCase
{
    public function testItCanAllowToCheckIfEmpty()
    {
        $stackUnderTest = new \Webkonstruktor\Collection\Stack();

        $actual = $stackUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}