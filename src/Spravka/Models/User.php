<?php

namespace Spravka\Models;

use Spravka\Interfaces\UserInterface;
use Spravka\Interfaces\UserMapperInterface;
use Spravka\Mappers\UserMapper;

class User implements UserInterface {
    private array $user;

    private UserMapper $mapper;

    public function __construct($f3) {
        $this->mapper = new UserMapper($f3->get("DB"));
    }

    public function auth( $email, $password) {
        $user = $this->mapper->findByEmailPassword($email, $password);
        return $this->validate($user);
    }

    public function create($email, $password, $username) {
        return $this->mapper->createUser($email, $password, $username);
    }

    public function authByToken($token) {
        $user = $this->mapper->findByToken($token);
        return $this->validate($user);
    }

    private function getFields() {
        return ["id", "email", "password", "username", "token"];
    }

    private function validate($user) {
        if($user == false) return false;
        $this->user = $user;
        return true;
    }

    public function generateToken() {
        $tokenGenerator = new TokenGenerator();
        $token = $tokenGenerator->generate();
        if($this->validate($this->user)) {
            $status = $this->mapper->saveToken($this->user["id"], $token);
            if($status == true) {
                $this->user["token"] = $token;
                return true;
            }
        }
        return false;
    }

    public function getAsArray() {
        return $this->user;
    }
}