<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Options;

use Nicklog\ImgProxy\Options\Height;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Height::class)]
class HeightTest extends TestCase
{
    public function testConstruct(): void
    {
        $width = new Height(100);
        self::assertSame(100, $width->height);
    }

    public function testData(): void
    {
        $width = new Height(100);
        self::assertSame([100], $width->data());
        self::assertSame('h:100', $width->__toString());
    }
}
