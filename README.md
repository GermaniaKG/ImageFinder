#Germania\ImageFinder

Callable wrapper around [Symfony's Finder Component.](http://symfony.com/doc/current/components/finder.html) For convenience purposes prepared for finding image files.

##Installation

```bash
$ composer require germania-kg/imagefinder
```


##Usage

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

##Customization

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





##Development and Testing

Develop using `develop` branch, using [Git Flow](https://github.com/nvie/gitflow).   

```bash
$ git clone git@github.com:GermaniaKG/ImageFinder.git image-finder
$ cd image-finder
$ cp phpunit.xml.dist phpunit.xml
$ phpunit
```

