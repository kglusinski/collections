<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


interface TypeValidator
{
    const TYPE_INT = 'integer';
    const TYPE_BOOL = 'boolean';
    const TYPE_FLOAT = 'double';
    const TYPE_STRING = 'string';
    const TYPE_ARRAY = 'array';
    const TYPE_OBJECT = 'object';
    const TYPE_RESOURCE = 'resource';

    public function validate($item, string $type): bool;
}