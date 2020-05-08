<?php

namespace Spravka\Mappers;

use Spravka\Interfaces\CitiesMapperInterface;

class CitiesMapper implements CitiesMapperInterface {
    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function getAllCities() {
        $sql = "SELECT * FROM cities;";
        return $this->db->exec($sql);
    }
}