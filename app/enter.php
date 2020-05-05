<?php

class enter {
    public function login() {
        $view = new view();
        echo $view->render("login.php");
    }

    public function auth($f3) {
        $email = $f3->get("POST.email");
        $password = $f3->get("POST.password");

    }
}