<?php

class main extends SecureController {
	public function index() {
		$view = new view();
		echo $view->render("_layout.php");
	}
}