<?php

class Controller {
    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function getResult($result, $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error]);
    }
}