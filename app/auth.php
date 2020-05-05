<?php

class auth {
    public function login() {
        $view = new view();
        echo $view->render("login.php");
    }
}