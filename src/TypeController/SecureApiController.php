<?php


namespace TypeController;


use Interfaces\IController;

class SecureApiController implements IController {
    private \Base $f3;

    public function __construct() {
        $this->f3 = \Base::instance();
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

    public function getResult(array $result, int $error = 0) {
        echo json_encode(["result"=>$result, "error"=>$error], JSON_UNESCAPED_UNICODE);
    }
}