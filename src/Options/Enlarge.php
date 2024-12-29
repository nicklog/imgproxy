<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options;

final readonly class Enlarge extends AbstractOption
{
    public function __construct(private bool $enlarge = true)
    {
    }

    public static function name(): string
    {
        return 'el';
    }

    /** @inheritDoc */
    public function data(): array
    {
        return [
            $this->enlarge ? 1 : 0,
        ];
    }
}
