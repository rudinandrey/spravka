<?php

require("../config.php");

$userAdapter = new \Tataisneft\Adapter\UserAdapter();
$user = $userAdapter->create(["user_id"=>0, "email"=>"rudinandrey@yandex.ru", "password"=>"123", "username"=>"Андрей"]);
print_r($user->get());



