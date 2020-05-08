<?php

namespace Spravka\Interfaces;

interface UserMapperInterface {
    public function findById($id);
    public function findByEmailPassword($email, $password);
    public function findByToken($token);
    public function createUser($email, $password, $username);
    public function saveToken($id, $token);
}