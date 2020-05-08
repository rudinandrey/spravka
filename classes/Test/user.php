<?php

namespace Test;

class user extends \Controller {
    public function __construct() {
    
    }
    
    public function ping($f3) {
        $this->getResult(["request"=>"pong"]);
    }
}