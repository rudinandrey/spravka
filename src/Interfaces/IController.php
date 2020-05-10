<?php

namespace Interfaces;

interface IController {
    public function beforeRoute();
    public function getResult(array $result, int $error = 0);
}