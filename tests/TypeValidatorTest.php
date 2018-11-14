<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection\Test;


use PHPUnit\Framework\TestCase;
use Webkonstruktor\Collection\Queue;
use Webkonstruktor\Collection\TypeValidator;

class TypeValidatorTest extends TestCase
{
    public function testItShouldValidateTypes()
    {
        $validatorUnderTest = new TypeValidator();

        $failedValidation = $validatorUnderTest->validate(1, 'string');
        $successValidation = $validatorUnderTest->validate(1, 'integer');
        $successObjectValidation = $validatorUnderTest->validate(new Queue(), Queue::class);

        $this->assertFalse($failedValidation);
        $this->assertTrue($successValidation);
        $this->assertTrue($successObjectValidation);
    }
}