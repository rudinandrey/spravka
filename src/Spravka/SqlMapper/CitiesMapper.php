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

    public function getEs09Code($cityId) {
        $sql = "SELECT es09 FROM city WHERE city_id = :id";
        $cities = $this->db->exec($sql, ["id"=>$cityId]);
        if(isset($cities) && count($cities) == 1) {
            return $cities[0]["es09"];
        } else {
            return false;
        }
    }
}