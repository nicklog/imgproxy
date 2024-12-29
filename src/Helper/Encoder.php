<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Helper;

use function base64_encode;
use function rtrim;
use function strtr;

final class Encoder
{
    public static function encode(string $string): string
    {
        return rtrim(strtr(base64_encode($string), '+/', '-_'), '=');
    }
}
