<?php

namespace Spravka\SqlMapper;

use DB\SQL;
use Spravka\Interfaces\SearchInterface;

class SearchMapper implements SearchInterface {

    /**
     * @var SQL
     */
    private SQL $db;

    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function search($city, $type, $searchName, $searchAddress) {
        $sql = "SELECT * FROM phonebook WHERE city = :city AND is_company = :type AND name LIKE :name AND address LIKE :address";
        return $this->db->exec($sql, ["city"=>$city, "type"=>$type, "name"=>$searchName."%", "address"=>$searchAddress."%"]);
    }
}