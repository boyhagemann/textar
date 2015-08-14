<?php

namespace Boyhagemann\Textar\Contracts;

interface Bucket
{
    /**
     * @param int $x
     * @param int $y
     * @return Bucket
     */
    public function setPosition($x, $y);

    /**
     * @param int $red
     * @param int $green
     * @param int $blue
     * @param float $alpha
     * @return Phrase
     */
    public function setColor($red, $green, $blue, $alpha = 1);

    /**
     * @return array
     */
    public function getColor();

    /**
     * @return int
     */
    public function getX();

    /**
     * @return int
     */
    public function getY();
}