<?php

namespace Tests;

class Es09 {

    public function test1() {
        echo "es09 test";
    }

    public function test2() {
        $url = "http://es09.ru:8080/api/company/search?city=1604000014&limit=20&offset=0&q=%D0%BA%D0%BE%D1%84%D0%B5";
        $result = file_get_contents($url);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}