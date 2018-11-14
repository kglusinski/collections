<?php
declare(strict_types=1);

namespace Webkonstruktor\Collection;


class TypeValidator
{
    public function validate($item, string $type): bool
    {
        if (gettype($item) === $type) {
            return true;
        }

        if (is_object($item) && get_class($item) === $type) {
            return true;
        }

        return false;
    }
}