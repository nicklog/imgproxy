<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Options;

use InvalidArgumentException;

use function in_array;
use function sprintf;

final readonly class ResizingType extends AbstractOption
{
    public const FIT       = 'fit';
    public const FILL      = 'fill';
    public const FILL_DOWN = 'fill-down';
    public const FORCE     = 'force';
    public const AUTO      = 'auto';

    private const TYPES = [
        self::FIT,
        self::FILL,
        self::FILL_DOWN,
        self::FORCE,
        self::AUTO,
    ];

    public function __construct(
        private string $type,
    ) {
        if (! in_array($type, self::TYPES, true)) {
            throw new InvalidArgumentException(sprintf('Invalid resizing type: %s', $type));
        }
    }

    public static function fromStringOrSelf(string|self $type): self
    {
        return $type instanceof self ? $type : new self($type);
    }

    public static function name(): string
    {
        return 'rt';
    }

    /** @inheritDoc */
    public function data(): array
    {
        return [
            $this->type,
        ];
    }
}
