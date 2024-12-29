<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options;

final readonly class Expires extends AbstractOption
{
    public function __construct(private int $timestamp)
    {
    }

    public static function name(): string
    {
        return 'exp';
    }

    /** @inheritDoc */
    public function data(): array
    {
        return [
            $this->timestamp,
        ];
    }
}
