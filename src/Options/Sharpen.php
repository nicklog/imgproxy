<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options;

use InvalidArgumentException;

use function sprintf;

final readonly class Sharpen extends AbstractOption
{
    public function __construct(private float $sigma)
    {
        if ($sigma < 0) {
            throw new InvalidArgumentException(sprintf('Invalid sharpen: %s', $sigma));
        }
    }

    public static function name(): string
    {
        return 'sh';
    }

    /** @inheritDoc */
    public function data(): array
    {
        return [
            $this->sigma,
        ];
    }
}
