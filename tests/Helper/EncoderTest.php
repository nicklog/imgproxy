<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Helper;

use Nicklog\ImgProxy\Helper\Encoder;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Encoder::class)]
class EncoderTest extends TestCase
{
    public function testEncode(): void
    {
        self::assertSame('aGVsbG8', Encoder::encode('hello'));
    }
}
