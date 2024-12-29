<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Signer;

interface Signer
{
    public function __invoke(string $string): string;
}
