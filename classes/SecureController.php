<?php

class SecureController {

    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function beforeRoute() {
        $token = $this->f3->get("COOKIE.spravka_token");

        $user = new \Spravka\Models\User($this->f3);
        if($token != null) {
            if(!$user->authByToken($token)) {
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }

    public function getResult($result, $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error]);
    }
}