<?php

namespace Spravka\Interfaces;


interface UserInterface {
    public function auth(\string $email, \string $password);
    public function generateToken();
    public function getAsArray();
}