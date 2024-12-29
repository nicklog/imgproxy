<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Options;

use Nicklog\ImgProxy\Options\ResizingType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(ResizingType::class)]
class ResizingTypeTest extends TestCase
{
    public function testData(): void
    {
        $resizingType = new ResizingType(ResizingType::FIT);
        self::assertSame([ResizingType::FIT], $resizingType->data());
        self::assertSame('rt:fit', $resizingType->__toString());
    }
}
