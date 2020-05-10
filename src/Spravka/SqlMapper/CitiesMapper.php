<?php

namespace Spravka\SqlMapper;

use DB\SQL;
use Spravka\Interfaces\CitiesMapperInterface;

class CitiesMapper implements CitiesMapperInterface {
    /**
     * @var SQL
     */
    private SQL $db;

    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function getAllCities() {
        $sql = "SELECT * FROM city;";
        return $this->db->exec($sql);
    }
}