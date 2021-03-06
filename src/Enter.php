<?php

use Spravka\SqlMapper\UserMapper;
use Spravka\Models\User;

class Enter {
    public function login() {
        $view = new view();
        echo $view->render("login.php");
    }

    public function auth($f3) {
        $email = $f3->get("POST.email");
        $password = $f3->get("POST.password");

        $user = new User($f3);
        if($user->auth($email, $password)) {
            // авторизация успешна
            if($user->generateToken()) {
                $token = $user->getAsArray()["token"];
                setcookie("spravka_token", $token, time() + 86400);
                header("Location: /");
            }
        } else {
            $view = new view();
            echo $view->render("login.php");
        }
    }
}