<?php

namespace Boyhagemann\Textar\Contracts;

interface Canvas
{
    public function add(Bucket $bucket);

    public function draw($width, $height, $background = '#fff');
}