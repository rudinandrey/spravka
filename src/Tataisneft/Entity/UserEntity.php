<?php

namespace Tataisneft\Entity;

class UserEntity {
    private $user;
    public function __construct($user) {
        if(count($user) != count($this->getFields())) throw new \Exception("Неподходящий формат пользователя");
        foreach($this->getFields() as $field) {
            $this->user[$field] = $user[$field];
        }
    }

    public function get() {
        return $this->user;
    }

    private function getFields() {
        return [
            "user_id",
            "email",
            "password",
            "username"
        ];
    }
}