<?php
namespace graychen\container\tests\Fixtures;

class Log
{
    public $content;
    public function __construct($content="")
    {
        $this->content=$content;
    }

    public function write()
    {
        return "write";
    }
}
