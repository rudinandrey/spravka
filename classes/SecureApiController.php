<?php

class SecureApiController {

    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function beforeRoute() {
        $token = $this->f3->get("COOKIE.spravka_token");
        $user = new \Spravka\Models\User($this->f3);

        if($token != null) {
            if(!$user->authByToken($token)) {
                $this->getResult(["msg"=>"Вы не авторизованы"], 1);
                return;
            }
        } else {
            $this->getResult(["msg"=>"Вы не авторизованы"], 1);
            return;
        }
    }

    public function getResult($result, $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error]);
    }
}