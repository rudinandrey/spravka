<?php

require_once("vendor/autoload.php");
require_once("config.php");

$f3->route("GET /", "main->index");
$f3->route("GET /login", "enter->login");
$f3->route("POST /auth", "enter->auth");
$f3->route("GET|POST /api/@method", "api->@method");
$f3->route("GET /@method", "main->@method");
$f3->route("GET /test/@area/@method", 'Test\@area->@method');

$f3->run();