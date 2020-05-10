<?php


namespace Tests;


use Spravka\Models\User;

class UserAuth {
    public function test($f3) {
        $user = new User($f3);
        $result = $user->auth("rudinandrey@yandex.ru", "123");

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }
}