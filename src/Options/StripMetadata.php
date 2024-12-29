<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options;

final readonly class StripMetadata extends AbstractOption
{
    public function __construct(
        private bool $strip = true,
    ) {
    }

    public static function name(): string
    {
        return 'sm';
    }

    /** @inheritDoc */
    public function data(): array
    {
        return [
            $this->strip ? 1 : 0,
        ];
    }
}
