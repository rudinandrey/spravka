<?php

namespace Spravka\Interfaces;


interface UserInterface {
    public function auth($email, $password);
    public function generateToken();
    public function getAsArray();
    public function create($email, $password, $username);
}