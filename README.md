# Germania KG · ImageFinder

**Callable wrapper around [Symfony's Finder Component.](http://symfony.com/doc/current/components/finder.html)  
For convenience purposes prepared for finding image files.**

[![Packagist](https://img.shields.io/packagist/v/germania-kg/imagefinder.svg?style=flat)](https://packagist.org/packages/germania-kg/imagefinder)
[![PHP version](https://img.shields.io/packagist/php-v/germania-kg/imagefinder.svg)](https://packagist.org/packages/germania-kg/imagefinder)
[![Build Status](https://img.shields.io/travis/GermaniaKG/ImageFinder.svg?label=Travis%20CI)](https://travis-ci.org/GermaniaKG/ImageFinder)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/GermaniaKG/ImageFinder/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/ImageFinder/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/GermaniaKG/ImageFinder/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/ImageFinder/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/GermaniaKG/ImageFinder/badges/build.png?b=master)](https://scrutinizer-ci.com/g/GermaniaKG/ImageFinder/build-status/master)



## Installation

```bash
$ composer require germania-kg/imagefinder
```


## Usage

Each iterator item will be an instance of Symfony's [SplFileInfo extension](http://api.symfony.com/3.2/Symfony/Component/Finder/SplFileInfo.html).

```php
use Germania\ImageFinder\ImageFinder;
use Symfony\Component\Finder\Finder;

// Setup
$finder = new Finder;
$image_finder = new ImageFinder( $finder );

// Grab from directory
$images = $image_finder( '/path/to/photos' );

foreach ($images as $image) {

	// Stolen from Symfony docs:
    // Dump the absolute path
    var_dump($file->getRealPath());

    // Dump the relative path to the file, omitting the filename
    var_dump($file->getRelativePath());

    // Dump the relative path to the file
    var_dump($file->getRelativePathname());
}
```

## Customization

The constructor accepts an array with allowed file extensions.

```php
$allowed = array("jpe?g", "webp" );
$image_finder = new ImageFinder( $finder, $allowed );
```

To configure allowed extensions during runtime, set member variable **extensions**:

```php
$image_finder = new ImageFinder( $finder);
$image_finder->extensions = array("jpe?g", "webp" );
```


## Development

```bash
$ git clone https://github.com/GermaniaKG/ImageFinder.git
$ cd ImageFinder
$ composer install
```

## Unit tests

Either copy `phpunit.xml.dist` to `phpunit.xml` and adapt to your needs, or leave as is. Run [PhpUnit](https://phpunit.de/) test or composer scripts like this:

```bash
$ composer test
# or
$ vendor/bin/phpunit
```

