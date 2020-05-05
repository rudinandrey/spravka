<?php

class SecureController {

    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function beforeRoute() {
        $token = $this->f3->get("COOKIE.token");
        if($token == null) header("Location: /login");
    }

    public function getResult($result, $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error]);
    }
}