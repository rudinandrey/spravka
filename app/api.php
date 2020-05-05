<?php

class api extends SecureController {
	public function ping() {
		echo json_encode(["request"=>"pong"], JSON_UNESCAPED_UNICODE);
	}
}