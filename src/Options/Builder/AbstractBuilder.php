<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options\Builder;

use Nicklog\ImgProxy\Options\Option;

/**
 * @template T of Option
 * @implements Builder<T>
 */
abstract class AbstractBuilder implements Builder
{
    public function __toString(): string
    {
        return $this->build()->__toString();
    }
}
