<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Domain;

use Nicklog\ImgProxy\Options\Builder\Builder;
use Nicklog\ImgProxy\Options\Option;
use Nicklog\ImgProxy\Options\Options;

use function array_values;

final readonly class Preset
{
    private function __construct(
        public string $name,
        public Options $options,
    ) {
    }

    public static function create(
        string $name,
        Option|Builder ...$options,
    ): self {
        return new self(
            $name,
            new Options(...array_values($options)),
        );
    }
}
