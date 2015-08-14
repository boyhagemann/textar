<?php

require_once 'vendor/autoload.php';

use Intervention\Image\ImageManager;
use Boyhagemann\Textar\Analyser;

class AnalyserTest extends PHPUnit_Framework_TestCase
{
    public function testAnalyse()
    {
        $analyser = new Analyser(new ImageManager);
        $result = $analyser->analyse('tests/test.jpg', 2, 2);

        $expected = [
            ['x' => 0, 'y' => 0, 'red' => 227, 'green' => 227, 'blue' => 222, 'brightness' => 226],
            ['x' => 0, 'y' => 1, 'red' => 231, 'green' => 224, 'blue' => 226, 'brightness' => 225],
            ['x' => 1, 'y' => 0, 'red' => 219, 'green' => 176, 'blue' => 204, 'brightness' => 188],
            ['x' => 1, 'y' => 1, 'red' => 203, 'green' => 154, 'blue' => 184, 'brightness' => 167],
        ];

        $this->assertSame($expected, $result);
    }
}