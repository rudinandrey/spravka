<?php

class login {
    public function login() {
        $view = new view();
        echo $view->render("login.php");
    }
}