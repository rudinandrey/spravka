<?php


namespace TypeController;


use Interfaces\IController;

class SecureController implements IController {
    private Base $f3;

    public function __construct($f3) {
        $this->f3 = $f3;
    }

    public function beforeRoute() {
        $token = $this->f3->get("COOKIE.spravka_token");
        $user = new \Spravka\Models\User($this->f3);

        if($token != null) {
            if(!$user->authByToken($token)) {
                header("Location: /");
                return;
            }
        } else {
            header("Location: /");
            return;
        }
    }

    public function getResult(array $result, int $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error], JSON_UNESCAPED_UNICODE);
    }
}