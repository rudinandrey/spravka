<?php

class main {
	public function index() {
		$view = new view();
		echo $view->render("_layout.php");
	}
}