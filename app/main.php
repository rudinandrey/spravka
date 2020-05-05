<?php

class main {
	public function index() {
		$view = new view();
		echo $view->render("_layout.php");
	}

	public function login() {
		$view = new view();
		echo $view->render("login.php");
	}
}