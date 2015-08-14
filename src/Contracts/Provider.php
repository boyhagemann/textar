<?php

namespace Boyhagemann\Textar\Contracts;

interface Provider
{
    /**
     * @return mixed
     */
    public function random();
}