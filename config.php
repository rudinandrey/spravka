<?php

require_once("vendor/autoload.php");

$connect = parse_ini_file("/etc/connect.ini");

$f3 = \Base::instance();
$db = new \DB\SQL("mysql:host=db;dbname={$connect["MYSQL_DATABASE"]};charset=utf8", $connect["MYSQL_USER"], $connect["MYSQL_PASSWORD"]);
$f3->set("DB", $db);

$f3->set("AUTOLOAD", "app/;classes/;");
$f3->set("ROOT", ".");
$f3->set("UI", "./ui/");