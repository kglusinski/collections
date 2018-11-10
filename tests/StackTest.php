<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;

use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Stack;

class StackTest extends TestCase
{
    public function testItCanAllowToCheckIfEmpty()
    {
        $stackUnderTest = new Stack();

        $actual = $stackUnderTest->isEmpty();

        $this->assertTrue($actual);
    }
}