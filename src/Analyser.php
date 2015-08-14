<?php

namespace Boyhagemann\Textar;

use Intervention\Image\ImageManager;

class Analyser implements Contracts\Analyser
{
    /**
     * @var ImageManager
     */
    protected $imageManager;

    /**
     * @param ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    /**
     * @param string $path
     * @param int    $width
     * @param int    $height
     * @return array
     */
    public function analyse($path, $width = 30, $height = 30)
    {
        $image = $this->imageManager->make($path);

        // Resize to the desired number of pixels
        $resized = $image->resize($width, $height);

        // Analyze every pixel on the x and y axis
        foreach(range(0, $width - 1) as $x) {
            foreach(range(0, $height - 1) as $y) {

                // Get the color and brightness from the pixel
                $rgb = $resized->pickColor($x, $y, 'array');

                // Add it to the result
                $result[] = [
                    'x'             => $x,
                    'y'             => $y,
                    'red'           => $rgb[0],
                    'green'         => $rgb[1],
                    'blue'          => $rgb[2],
                    'brightness'    => $this->brightness($rgb),
                ];
            }
        }

        return $result;
    }

    /**
     * Get the perceived brightness of a color.
     *
     * @param array $color
     * @return int
     */
    protected function brightness(Array $color)
    {
        list($red, $green, $blue) = $color;

        return (int) sqrt(0.2126 * pow($red, 2) + 0.7152 * pow($green, 2) + 0.0722 * pow($blue, 2));
    }
}