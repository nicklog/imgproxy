<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Options;

use Nicklog\ImgProxy\Options\Size;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Size::class)]
class SizeTest extends TestCase
{
    /** @param array<mixed> $data */
    #[DataProvider('dataData')]
    public function testData(
        Size $size,
        array $data,
        string $string,
    ): void {
        self::assertSame($data, $size->data());
        self::assertSame($string, $size->__toString());
    }

    /** @return list<array{size: Size, data: list<mixed>, string: string}> */
    public static function dataData(): array
    {
        return [
            [
                'size' => new Size(100, 200),
                'data' => [100, 200, null, null],
                'string' => 's:100:200',
            ],
            [
                'size' => new Size(100, 200, true, true),
                'data' => [100, 200, 1, 1],
                'string' => 's:100:200:1:1',
            ],
        ];
    }
}
