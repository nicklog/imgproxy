### ImgProxy

This is a PHP library that makes it easy to build URL for [ImgProxy](https://imgproxy.net).

[![Version][version-badge]][version-link]
[![Total Downloads][downloads-badge]][downloads-link]
[![Php][php-badge]][php-link]
[![License][license-badge]](LICENSE)
[![Build Status][build-badge]][build-link]
[![Latest Stable Version][version-stable]][version-link]
[![Latest Unstable Version][version-unstable]][version-link]
[![Total Downloads][downloads-total]][version-link]
[![Monthly Downloads][downloads-monthly]][version-link]
[![Daily Downloads][downloads-daily]][version-link]

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require nicklog/imgproxy:^1.0
```

or add this code line to the `require` section of your `composer.json` file:

```
"nicklog/imgproxy": "^1.0"
```

Usage
-----

```php
use NickLog\ImgProxy\ImgProxy;
use NickLog\ImgProxy\KeyPair;
use NickLog\ImgProxy\Options\Dpr;
use NickLog\ImgProxy\Options\Quality;
use NickLog\ImgProxy\Options\Width;
use NickLog\ImgProxy\Options\Height;

$imgProxyBaseUrl = 'https://imgproxy.example.com';
$key = getenv('IMGPROXY_KEY');
$salt = getenv('IMGPROXY_SALT');

$src = 'http://example.com/image.jpg';

$signer = new KeyPair($key, $salt);
$imgProxy = new ImgProxy($imgProxyBaseUrl, $signer);

$builder = $imgProxy->urlBuilder($src);
$builder = $builder->with(
    new Dpr(2),
    new Quality(90),
    new Width(300),
    new Height(400)
);
    
$url = $builder->build()->__toString();  // encoded url
$url = $builder->encoded(false)->build()->__toString(); // plain url

# example: /9SaGqJILqstFsWthdP/dpr:2/q:90/w:300/h:400/aHR0cDovL2V4YW1w/bGUuY29tL2ltYWdl/LmpwZw
```

License
-------

Released under the [MIT license](LICENSE).


[version-badge]:     https://img.shields.io/packagist/v/nicklog/imgproxy.svg
[version-stable]:    https://img.shields.io/packagist/v/nicklog/imgproxy.svg?label=stable
[version-unstable]:  https://img.shields.io/packagist/v/nicklog/imgproxy.svg?label=unstable
[downloads-total]:   https://img.shields.io/packagist/dt/nicklog/imgproxy.svg
[downloads-monthly]: https://img.shields.io/packagist/dm/nicklog/imgproxy.svg
[downloads-daily]:   https://img.shields.io/packagist/dd/nicklog/imgproxy.svg
[version-link]:      https://packagist.org/packages/nicklog/imgproxy
[downloads-link]:    https://packagist.org/packages/nicklog/imgproxy
[downloads-badge]:   https://poser.pugx.org/nicklog/imgproxy/downloads.svg
[php-badge]:         https://img.shields.io/packagist/php-v/nicklog/imgproxy.svg
[php-link]:          https://www.php.net/
[license-badge]:     https://img.shields.io/badge/license-MIT-brightgreen.svg
[build-link]:        https://github.com/nicklog/imgproxy/actions?workflow=test
[build-badge]:       https://github.com/nicklog/imgproxy/workflows/test/badge.svg