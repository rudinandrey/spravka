<?php

namespace Tataisneft\Adapter;

use DB\SQL;

class CityAdapter {
    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function getAll() {
        $sql = "SELECT * FROM city;";
        $cities = $this->db->exec($sql);
        return $cities;
    }
}