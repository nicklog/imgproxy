<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Signer;

use Nicklog\ImgProxy\Signer\KeyPair;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(KeyPair::class)]
class KeyPairTest extends TestCase
{
    public function testHashing(): void
    {
        $keyPair = new KeyPair(
            '009b8493e24db32c95632266ca6ccbcd1f48fcaa83dfd59390e384df522d9d781051cec5d8d1900b305f9fc51c6dbd3b6a10c2121726c270e1376f34fc59e7e8',
            'c6b399b91ea2aa5e950c571dee5e08113c661906c611e9e38fe3220e8d576ce2f926d451becf4f3aa4e40a3c1f9e218aa75e0428630c3ddeaf0755fa3d8f82eb',
        );
        self::assertSame('VeC-5QmMtFBDB5Cnp0sw4P82xlvgXnYj2tOLITb1IRA', $keyPair->__invoke('test'));
    }
}
