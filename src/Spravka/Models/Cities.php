<?php

namespace Spravka\Models;

use Spravka\SqlMapper\CitiesMapper;

class Cities {
    /**
     * @var CitiesMapper
     */
    private CitiesMapper $mapper;

    public function __construct($f3) {
        $this->mapper = new CitiesMapper($f3->get("DB"));
    }

    public function getAllCities() {
        return $this->mapper->getAllCities();
    }

    public function getEs09Code($cityId) {
        return $this->mapper->getEs09Code($cityId);
    }
}