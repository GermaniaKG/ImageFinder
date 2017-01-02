<?php
namespace Germania\ImageFinder;

use Symfony\Component\Finder\Finder;

class ImageFinder
{
    /**
     * @var Finder
     */
    public $finder;

    /**
     * @var array
     */
    public $extensions = array('jpe?g', 'gif', 'png', 'svgz?');


    /**
     * @param Finder $finder     Symfony Finder instance
     * @param array  $extensions Optional: Array with allowed file extensions. Default: `array('jpe?g', 'gif', 'png', 'svgz?')`
     */
    public function __construct( Finder $finder, $extensions = array() )
    {
        $this->finder = $finder;
        $this->extensions = $extensions ?: $this->extensions;
    }


    /**
     * See Symfony Finder API: http://symfony.com/doc/current/components/finder.html
     *
     * @param  string|array $path  Path or pathes
     * @param  string       $regex Optional: Custom file name regex
     * @return \Iterator|array
     */
    public function __invoke( $path, $regex = null )
    {
        $regex = $regex ?: '/\.(' . implode('|', $this->extensions) . ')$/i';

        return realpath( $path )
        ?  $this->finder
            ->ignoreUnreadableDirs()
            ->in( $path )
            ->ignoreDotFiles(true)
            ->files()
            ->name( $regex )
        : array();
    }
}
