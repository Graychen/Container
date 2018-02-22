<?php
namespace graychen\Tests;

use graychen\container\Container;
use graychen\container\tests\Fixtures\LogInterface;
use graychen\container\tests\Fixtures\Log;

class ContainerTest extends \PHPUnit_Framework_TestCase{

    public function testSetNew(){
        $container = new Container(); 
        $container->set("log",new Log());
        $this->assertEquals("write",$container->get("log")->write());
    }

    public function testSetShared(){
        $container = new Container();
        $container->setShared("logShared",function($content=""){
            return new Log($content);
        });
        $log=$container->get("logShared",array("writeContent"));
        $this->assertEquals("writeContent",$log->content);
    }

    public function testSetString(){
        $container = new Container();
        $container->set("log","graychen\container\\tests\Fixtures\Log");
        $log=$container->get("log",array("setString"));
        $this->assertEquals("setString",$log->content);;
    }
}
