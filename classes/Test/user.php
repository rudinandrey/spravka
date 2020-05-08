<?php

namespace Test;

class user extends \Controller {
    public function __construct() {
    
    }
    
    public function ping($f3) {
        $user = new \Spravka\Models\User($f3);
        $status = $user->auth("rudinandrey@yandex.ru", "123");

        $this->getResult(["status"=>$status]);
    }
}