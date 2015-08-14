<?php

require_once 'vendor/autoload.php';

use Mockery as m;
use Boyhagemann\Textar\Canvas;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Boyhagemann\Textar\Contracts\Bucket;

class CanvasTest extends PHPUnit_Framework_TestCase
{
    public function testAdd()
    {
        $manager = m::mock(ImageManager::class);
        $bucket = m::mock(Bucket::class);

        $canvas = new Canvas($manager);

        $this->assertInstanceOf(Canvas::class, $canvas->add($bucket));
    }

    public function testDraw()
    {
        $manager = m::mock(ImageManager::class);
        $image = m::mock(Image::class);

        $manager->shouldReceive('canvas')->withArgs([100,100,'#fff'])->andReturn($image);
        $image->shouldReceive('response')->withArgs(['png', 100]);

        $canvas = new Canvas($manager);
        $canvas->draw(100,100);
    }

}