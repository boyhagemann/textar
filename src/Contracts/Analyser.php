<?php

namespace Boyhagemann\Textar\Contracts;

interface Analyser
{
    /**
     * @param string $path
     * @param int    $width
     * @param int    $height
     * @return array
     */
    public function analyse($path, $width = 30, $height = 30);
}