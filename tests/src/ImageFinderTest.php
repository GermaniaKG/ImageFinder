<?php
namespace tests;

use Germania\ImageFinder\ImageFinder;
use Symfony\Component\Finder\Finder;
use \Traversable;

class ImageFinderTest extends \PHPUnit\Framework\TestCase
{


    public function testSimple( )
    {
        $finder = new Finder;
        $sut = new ImageFinder( $finder );
        $images = $sut( './' );
        $this->assertInstanceOf( Traversable::class, $images);
    }


}
