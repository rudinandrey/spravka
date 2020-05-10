<?php

namespace TypeController;

use Interfaces\IController;

class SimpleController implements IController {
    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function beforeRoute() {

    }

    public function getResult($result, $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error], JSON_UNESCAPED_UNICODE);
    }
}