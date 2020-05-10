<?php


class Main {
    public function index($f3) {

        $view = new view();
        echo $view->render("_layout.php");
    }
}