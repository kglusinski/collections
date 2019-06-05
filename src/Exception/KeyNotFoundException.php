<?php

declare(strict_types=1);

namespace Webkonstruktor\Collection\Exception;

class KeyNotFoundException extends \Exception
{
    public function __construct(string $key)
    {
        parent::__construct("Cannot found value for key: $key. Key doesn't exist.");
    }
}