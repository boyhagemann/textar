<?php

require_once 'vendor/autoload.php';

use Boyhagemann\Textar\Text;
use Boyhagemann\Textar\Contracts\Bucket;

class TextTest extends PHPUnit_Framework_TestCase
{
    public function testSetters()
    {
        $text = new Text();

        $this->assertInstanceOf(Bucket::class, $text->setText('Foo'));
        $this->assertInstanceOf(Bucket::class, $text->setPosition(3,5));
        $this->assertInstanceOf(Bucket::class, $text->setColor(10,244,3,0.5));
        $this->assertInstanceOf(Bucket::class, $text->setFont('test'));
        $this->assertInstanceOf(Bucket::class, $text->setFontSize(24));
        $this->assertInstanceOf(Bucket::class, $text->setRotation(45));
    }

    /**
     * @depends testSetters
     */
    public function testGetters()
    {
        $text = new Text();

        $text->setText('Foo');
        $text->setPosition(3,5);
        $text->setColor(1,2,3,0.5);
        $text->setFont('test');
        $text->setFontSize(24);
        $text->setRotation(45);

        $this->assertSame('Foo', $text->getText());
        $this->assertSame(3, $text->getX());
        $this->assertSame(5, $text->getY());
        $this->assertSame([1, 2, 3, 0.5], $text->getColor());
        $this->assertSame('test', $text->getFont());
        $this->assertSame(24, $text->getFontSize());
        $this->assertSame(45, $text->getRotation());
    }

}