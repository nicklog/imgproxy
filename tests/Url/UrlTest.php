<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Url;

use Nicklog\ImgProxy\Options\Options;
use Nicklog\ImgProxy\Options\Quality;
use Nicklog\ImgProxy\Options\Resize;
use Nicklog\ImgProxy\Options\ResizingType;
use Nicklog\ImgProxy\Signer\Insecure;
use Nicklog\ImgProxy\Signer\KeyPair;
use Nicklog\ImgProxy\Url\Url;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(Url::class)]
class UrlTest extends TestCase
{
    #[DataProvider('dataData')]
    public function testData(
        Url $url,
        string $string,
    ): void {
        self::assertSame($string, $url->__toString());
    }

    /** @return list<array{url: Url, string: string}> */
    public static function dataData(): array
    {
        return [
            [
                'url' => new Url(
                    'https://img.example.com/',
                    new Insecure(),
                    'https://example.com/image.jpg',
                    new Options(
                        new Resize(ResizingType::FIT, 100, 200),
                    ),
                    null,
                    true,
                    false,
                    0,
                ),
                'string' => 'https://img.example.com/insecure/rs:fit:100:200/aHR0cHM6Ly9leGFtcGxlLmNvbS9pbWFnZS5qcGc',
            ],
            [
                'url' => new Url(
                    'https://img.example.com/',
                    new KeyPair(
                        '009b8493e24db32c95632266ca6ccbcd1f48fcaa83dfd59390e384df522d9d781051cec5d8d1900b305f9fc51c6dbd3b6a10c2121726c270e1376f34fc59e7e8',
                        'c6b399b91ea2aa5e950c571dee5e08113c661906c611e9e38fe3220e8d576ce2f926d451becf4f3aa4e40a3c1f9e218aa75e0428630c3ddeaf0755fa3d8f82eb',
                    ),
                    'https://example.com/image.jpg',
                    new Options(
                        new Quality(80),
                        new Resize(ResizingType::FIT, 100, 200),
                    ),
                    null,
                    true,
                    false,
                    0,
                ),
                'string' => 'https://img.example.com/i5CNS8Yb-JyrBMlzsH0tGNa03Dod4GD7hdchsTzkmAQ/q:80/rs:fit:100:200/aHR0cHM6Ly9leGFtcGxlLmNvbS9pbWFnZS5qcGc',
            ],
        ];
    }
}
