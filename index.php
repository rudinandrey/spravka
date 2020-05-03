<?php

require("vendor/autoload.php");

$connect = parse_ini_file("/etc/connect.ini");


$f3 = \Base::instance();
$db = new \DB\SQL("mysql:host=db;dbname={$connect["MYSQL_DATABASE"]};charset=utf8", $connect["MYSQL_USER"], $connect["MYSQL_PASSWORD"]);


$test = new \Tataisneft\Spravka\Test();
echo $test->index();