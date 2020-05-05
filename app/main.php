<?php

class main extends Controller {
	public function index() {
		$view = new view();
		echo $view->render("_layout.php");
	}

    public function test() {
        echo "test";
    }
}