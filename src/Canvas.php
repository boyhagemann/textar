<?php

namespace Boyhagemann\Textar;

use Boyhagemann\Textar\Contracts\Bucket;
use Boyhagemann\Textar\Contracts\Text;
use Intervention\Image\Gd\Font;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;

class Canvas implements Contracts\Canvas
{
    /**
     * @var ImageManager
     */
    protected $imageManager;

    /**
     * @var Bucket[]
     */
    protected $buckets = [];

    /**
     * @param ImageManager $imageManager
     */
    public function __construct(ImageManager $imageManager)
    {
        $this->imageManager = $imageManager;
    }

    /**
     * @param Bucket $bucket
     * @return Canvas
     */
    public function add(Bucket $bucket)
    {
        $this->buckets[] = $bucket;

        return $this;
    }

    /**
     * @return int
     */
    protected function getHighestX()
    {
        $x = [0];
        foreach($this->buckets as $bucket) {
            $x[] = $bucket->getX();
        }

        return max($x);
    }

    /**
     * @return int
     */
    protected function getHighestY()
    {
        $y = [0];
        foreach($this->buckets as $bucket) {
            $y[] = $bucket->getY();
        }

        return max($y);
    }

    /**
     * @param int    $width
     * @param int    $height
     * @param int    $padding
     * @param string $background
     * @return Image
     */
    public function draw($width, $height, $padding = 0, $background = '#fff')
    {
        $canvas = $this->imageManager->canvas($width, $height, $background);

        $maxX = $this->getHighestX();
        $maxY = $this->getHighestY();

        $stepX = ($width - 2 * $padding) / ($maxX + 1);
        $stepY = ($height - 2 * $padding) / ($maxY + 1);

        foreach($this->buckets as $bucket) {

            $x = $bucket->getX() * $stepX + $padding;
            $y = $bucket->getY() * $stepY + $padding;

            if($bucket instanceof Text) {
                $text = $bucket->getText();

                $canvas->text($text, $x, $y, function(Font $font) use ($bucket) {
                    $font->file($bucket->getFont());
                    $font->size($bucket->getFontSize());
                    $font->color($bucket->getColor());
                    $font->align('center');
                    $font->valign('center');
                    $font->angle($bucket->getRotation());
                });
            }

        }

        return $canvas->response('png', 100);
    }
}