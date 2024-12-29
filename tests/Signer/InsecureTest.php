<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Tests\Signer;

use Nicklog\ImgProxy\Signer\Insecure;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(Insecure::class)]
class InsecureTest extends TestCase
{
    public function testHashing(): void
    {
        $insecure = new Insecure();
        self::assertSame('insecure', $insecure->__invoke('test'));
    }
}
