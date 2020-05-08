<?php

namespace Spravka\Models;

use Spravka\Mappers\CitiesMapper;

class Cities {
    public function __construct($f3) {
        $this->mapper = new CitiesMapper($f3->get("DB"));
    }

    public function getAllCities() {
        return $this->mapper->getAllCities();
    }
}