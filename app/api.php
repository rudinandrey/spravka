<?php

class api extends SecureApiController {
	public function ping() {
		echo json_encode(["request"=>"pong"], JSON_UNESCAPED_UNICODE);
	}

	public function cities($f3) {
        $cities = new \Spravka\Models\Cities($f3);
        $this->getResult(["cities"=>$cities->getAllCities()]);
    }
}