<?php

namespace Boyhagemann\Textar\Contracts;

interface Text extends Bucket
{
    /**
     * @param string $text
     * @return Text
     */
    public function setText($text);

    /**
     * @return string
     */
    public function getText();

    /**
     * @param int $degrees
     * @return Text
     */
    public function setRotation($degrees);

    /**
     * @return int
     */
    public function getRotation();

    /**
     * @param string $path
     * @return Text
     */
    public function setFont($path);

    /**
     * @return string
     */
    public function getFont();

    /**
     * @param int $size
     * @return Text
     */
    public function setFontSize($size);

    /**
     * @return int
     */
    public function getFontSize();
}