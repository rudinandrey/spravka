<?php


class Main extends \TypeController\SecureController {
    public function index($f3) {

        $view = new view();
        echo $view->render("_layout.php");
    }
}