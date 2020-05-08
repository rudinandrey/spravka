<?php

class api extends SecureApiController {

	public function cities($f3) {
        $cities = new \Spravka\Models\Cities($f3);
        $this->getResult(["cities"=>$cities->getAllCities()]);
    }

    public function add($f3) {
        $this->getResult(["abonent"=>$f3->get("POST")]);
    }
}