<?php

require_once 'vendor/autoload.php';

use Boyhagemann\Textar\Provider;

class TextProviderTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider provideRandom
     */
    public function testRandom($items, $regex)
    {
        $provider = new Provider($items);
        $this->assertRegExp($regex, (string) $provider->random());
    }

    public function provideRandom()
    {
        return [
            [['foo', 'bar'], '/foo|bar/'],
            [[1,2], '/[1,2]+/'],
        ];
    }
}