<?php

require("../config.php");


$user = new \Spravka\Models\User($f3);
$status = $user->create("rudinandrey@yandex.ru", "123", "Rudin Andrey");
echo $status;

echo "\n";


//
//$userAdapter = new \Tataisneft\Adapter\UserAdapter($db);
//$user = $userAdapter->create(["user_id"=>0, "email"=>"rudinandrey@yandex.ru", "password"=>"123", "username"=>"Андрей"]);
print_r($user->get());



