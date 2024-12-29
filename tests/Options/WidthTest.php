<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Options;

use Nicklog\ImgProxy\Options\Width;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Width::class)]
class WidthTest extends TestCase
{
    public function testConstruct(): void
    {
        $width = new Width(100);
        self::assertSame(100, $width->width);
    }

    public function testData(): void
    {
        $width = new Width(100);
        self::assertSame([100], $width->data());
        self::assertSame('w:100', $width->__toString());
    }
}
