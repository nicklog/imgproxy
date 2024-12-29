<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options\Builder;

use Nicklog\ImgProxy\Options\Option;

/** @template T of Option */
interface Builder extends Option
{
    /** @phpstan-return T */
    public function build(): Option;
}
