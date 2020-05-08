<?php

require("../config.php");

$user = new \Spravka\Models\User($f3);

$status = $user->auth("rudinandrey@yandex.ru", "123");

echo json_encode(["status"=>$status], JSON_UNESCAPED_UNICODE);