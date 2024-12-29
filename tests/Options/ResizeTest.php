<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Options;

use Nicklog\ImgProxy\Options\Resize;
use Nicklog\ImgProxy\Options\ResizingType;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Resize::class)]
class ResizeTest extends TestCase
{
    /** @param array<mixed> $data */
    #[DataProvider('dataData')]
    public function testData(
        Resize $resize,
        array $data,
        string $string,
    ): void {
        self::assertSame($data, $resize->data());
        self::assertSame($string, $resize->__toString());
    }

    /** @return list<array{resize: Resize, data: list<mixed>, string: string}> */
    public static function dataData(): array
    {
        return [
            [
                'resize' => new Resize(ResizingType::FIT, 100, 200),
                'data' => ['fit', 100, 200, null, null],
                'string' => 'rs:fit:100:200',
            ],
            [
                'resize' => new Resize(ResizingType::FILL_DOWN, 100, 200),
                'data' => ['fill-down', 100, 200, null, null],
                'string' => 'rs:fill-down:100:200',
            ],
            [
                'resize' => new Resize(ResizingType::FIT, 100, 200, true, true),
                'data' => ['fit', 100, 200, 1, 1],
                'string' => 'rs:fit:100:200:1:1',
            ],
            [
                'resize' => new Resize(ResizingType::FIT, 100, 200, false, false),
                'data' => ['fit', 100, 200, 0, 0],
                'string' => 'rs:fit:100:200:0:0',
            ],
        ];
    }
}
