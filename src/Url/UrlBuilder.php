<?php

declare(strict_types=1);

namespace Nicklog\ImgProxy\Url;

use Nicklog\ImgProxy\Domain\ImageFormat;
use Nicklog\ImgProxy\Domain\Preset;
use Nicklog\ImgProxy\Options\Builder\Builder;
use Nicklog\ImgProxy\Options\Option;
use Nicklog\ImgProxy\Options\Options;
use Nicklog\ImgProxy\Signer\Signer;
use Stringable;

final class UrlBuilder implements Stringable
{
    private bool $encoded = true;

    private bool $addExtension = false;

    private int $splitSize = 0;

    private Preset|null $preset = null;

    private Options $options;

    private readonly ImageFormat|null $format;

    public function __construct(
        private readonly string $baseUrl,
        private readonly Signer $signer,
        private readonly string $source,
        string|null $extension = null,
    ) {
        $this->format  = $extension !== null ? ImageFormat::tryFrom($extension) : null;
        $this->options = new Options();
    }

    public function with(Option|Builder ...$options): self
    {
        $self          = clone $this;
        $self->options = $this->options->add(...$options);

        return $self;
    }

    public function withPreset(Preset $preset): self
    {
        $self         = clone $this;
        $self->preset = $preset;

        return $self;
    }

    public function encoded(bool $encoded): self
    {
        $self          = clone $this;
        $self->encoded = $encoded;

        return $self;
    }

    public function split(int $size): self
    {
        $self            = clone $this;
        $self->splitSize = $size;

        return $self;
    }

    public function useExtension(bool $useExtension = true): self
    {
        $self               = clone $this;
        $self->addExtension = $useExtension;

        return $self;
    }

    public function build(): Url
    {
        $options = $this->preset->options ?? new Options();
        $options = $options->merge($this->options);

        return new Url(
            $this->baseUrl,
            $this->signer,
            $this->source,
            $options,
            $this->format,
            $this->encoded,
            $this->addExtension,
            $this->splitSize,
        );
    }

    public function __toString(): string
    {
        return $this->build()->__toString();
    }
}
