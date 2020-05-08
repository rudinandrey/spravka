<?php

require("vendor/autoload.php");

class UsersTest extends \PHPUnit\Framework\TestCase {
    public function testUser() {
        $user = ["user_id"=>0, "email"=>"rudinandrey@yandex.ru", "password"=>"123", "username"=>"Andrey"];
        $userEntity = new \Tataisneft\Entity\UserEntity($user);
        $this->assertEquals($user, $userEntity->get());
    }
}