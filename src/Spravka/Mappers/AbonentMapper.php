<?php

namespace Spravka\Mappers;

use DB\SQL;
use Spravka\Models\Abonent;

class AbonentMapper {
    /**
     * @var SQL
     */
    private SQL $db;

    public function __construct(SQL $db) {
        $this->db = $db;
    }

    public function add(Abonent $abonent) {
        $sql = "INSERT INTO phonebook (city, phone, name, owner, address, info, is_visible, is_company) 
                VALUES (:city, :phone, :name, :owner, :address, :info, :is_visible, :is_company);";
        $ab = $this->getRightAbonent($abonent);
        $c = $this->db->exec($sql, $ab) == 1;
        return $c;
    }

    public function getRightAbonent($abonent) {
        $fields = ["city", "phone", "name", "owner", "address", "info", "is_visible", "is_company"];
        $ab = [];
        foreach ($fields as $field) {
            $ab[$field] = $abonent[$field];
        }
        return $ab;
    }
}