<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Options;

use Nicklog\ImgProxy\Options\Quality;
use Nicklog\ImgProxy\Options\Resize;
use Nicklog\ImgProxy\Options\ResizingType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Quality::class)]
class QualityTest extends TestCase
{
    public function testData(): void
    {
        $quality = new Quality(100);
        self::assertSame([100], $quality->data());
        self::assertSame('q:100', $quality->__toString());
    }

    /** @return list<array{size: Resize, data: list<mixed>, string: string}> */
    public static function dataData(): array
    {
        return [
            [
                'size' => new Resize(ResizingType::FIT, 100, 200),
                'data' => ['fit', 100, 200, null, null],
                'string' => 'rs:fit:100:200',
            ],
            [
                'size' => new Resize(ResizingType::FILL_DOWN, 100, 200),
                'data' => ['fill-down', 100, 200, null, null],
                'string' => 'rs:fill-down:100:200',
            ],
            [
                'size' => new Resize(ResizingType::FIT, 100, 200, true, true),
                'data' => ['fit', 100, 200, 1, 1],
                'string' => 'rs:fit:100:200:1:1',
            ],
            [
                'size' => new Resize(ResizingType::FIT, 100, 200, false, false),
                'data' => ['fit', 100, 200, 0, 0],
                'string' => 'rs:fit:100:200:0:0',
            ],
        ];
    }
}
