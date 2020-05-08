<?php

namespace Spravka\Interfaces;


interface UserInterface {
    public function auth(\string $email, \string $password);
    public function generateToken();
    public function getAsArray();
    public function create(\string $email, \string $password, \string $username);
}