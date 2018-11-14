<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


use Webkonstruktor\Collection\Exception\InvalidElementTypeException;

class TypedQueue extends Queue
{
    const TYPE_INT = 'integer';
    const TYPE_BOOL = 'boolean';
    const TYPE_FLOAT = 'double';
    const TYPE_STRING = 'string';
    const TYPE_ARRAY = 'array';
    const TYPE_OBJECT = 'object';
    const TYPE_RESOURCE = 'resource';

    /** @var string */
    private $type;

    /** @var TypeValidator */
    private $validator;

    public function __construct(string $type, TypeValidator $validator)
    {
        $this->type = $type;
        $this->validator = $validator;
    }

    public function push($item): void
    {
        if (!$this->validator->validate($item, $this->type)) {
            throw new InvalidElementTypeException(gettype($item), $this->type);
        }

        parent::push($item);
    }
}