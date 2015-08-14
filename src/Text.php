<?php

namespace Boyhagemann\Textar;

use ArrayObject;

class Text extends ArrayObject implements Contracts\Text
{
    /**
     * @param int $x
     * @param int $y
     * @return Text
     */
    public function setPosition($x, $y)
    {
        $this['x'] = $x;
        $this['y'] = $y;

        return $this;
    }

    /**
     * @param string $text
     * @return Text
     */
    public function setText($text)
    {
        $this['text'] = $text;

        return $this;
    }

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @param float $alpha
     * @return Text
     */
    public function setColor($red, $green, $blue, $alpha = 1)
    {
        $this['color'] = [$red, $green, $blue, $alpha];

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this['text'];
    }

    /**
     * @return array
     */
    public function getColor()
    {
        return $this['color'];
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this['x'];
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this['y'];
    }

    /**
     * @param int $degrees
     * @return \Boyhagemann\Textar\Contracts\Text
     */
    public function setRotation($degrees)
    {
        $this['rotation'] = $degrees;

        return $this;
    }

    /**
     * @return int
     */
    public function getRotation()
    {
        return $this['rotation'];
    }

    /**
     * @param string $path
     * @return \Boyhagemann\Textar\Contracts\Text
     */
    public function setFont($path)
    {
        $this['font'] = $path;

        return $this;
    }

    /**
     * @return string
     */
    public function getFont()
    {
        return $this['font'];
    }

    /**
     * @param int $size
     * @return \Boyhagemann\Textar\Contracts\Text
     */
    public function setFontSize($size)
    {
        $this['fontSize'] = $size;

        return $this;
    }

    /**
     * @return int
     */
    public function getFontSize()
    {
        return $this['fontSize'];
    }


}