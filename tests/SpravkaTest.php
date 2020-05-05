<?php

require_once("vendor/autoload.php");

class SpravkaTest extends \PHPUnit\Framework\TestCase {
    public function testTrue() {
        $this->assertTrue(true);
    }

    public function testHello() {
        $hello = new \Tataisneft\Spravka\Test();
        $this->assertEquals($hello->index(), "Hello world");
    }
}