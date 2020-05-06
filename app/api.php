<?php

class api extends Controller {
	public function ping() {
		echo json_encode(["request"=>"pong"], JSON_UNESCAPED_UNICODE);
	}

	public function cities($f3) {
        $cityAdapter = new \Tataisneft\Adapter\CityAdapter($f3->get("DB"));
        $cities = $cityAdapter->getAll();
        $this->getResult(["cities"=>$cities]);
    }
}