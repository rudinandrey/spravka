<?php

class login extends Controller {
    public function login() {
        $view = new view();
        echo $view->render("login.php");
    }
}