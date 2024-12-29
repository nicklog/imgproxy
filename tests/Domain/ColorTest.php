<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Domain;

use Nicklog\ImgProxy\Domain\Color;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Color::class)]
class ColorTest extends TestCase
{
    public function testConstruct(): void
    {
        $color = new Color('FF0000');
        self::assertSame('ff0000', $color->color);
    }

    public function testIsValidHex(): void
    {
        self::assertTrue(Color::isValidHexColor('ff0000'));
        self::assertTrue(Color::isValidHexColor('FF0000'));
        self::assertTrue(Color::isValidHexColor('00ff00'));

        self::assertFalse(Color::isValidHexColor('00GG00'));
        self::assertFalse(Color::isValidHexColor('00ff0'));
        self::assertFalse(Color::isValidHexColor('00ff000'));
    }
}
