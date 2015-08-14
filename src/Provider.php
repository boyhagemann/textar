<?php

namespace Boyhagemann\Textar;

class Provider implements Contracts\Provider
{
    /**
     * @var array
     */
    protected $item = [];

    /**
     * @param array $items
     */
    public function __construct(Array $items = [])
    {
        foreach($items as $item) {
            $this->items[$item] = $item;
        }
    }

    /**
     * @return mixed
     */
    public function random()
    {
        return array_rand($this->items);
    }
}