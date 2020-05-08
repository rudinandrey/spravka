<?php

class main extends SecureController {
	public function index($f3) {

		$view = new view();
		echo $view->render("_layout.php");
	}

    public function test() {
        echo "test";
    }
}