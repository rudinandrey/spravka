<?php

namespace Spravka\SqlMapper;

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

    public function add($abonent) {
        $sql = "INSERT INTO phonebook (city, phone, name, owner, address, info, is_visible, is_company) 
                VALUES (:city, :phone, :name, :owner, :address, :info, :is_visible, :is_company);";
        $ab = $this->getRightAbonent($abonent);
        $c = $this->db->exec($sql, $ab) == 1;
        return $c;
    }

    public function save($abonent) {
        $sql = "UPDATE phonebook SET phone = :phone, name = :name, owner = :owner, address = :address, info = :info, is_visible = :is_visible WHERE id = :id";
        $c = $this->db->exec($sql, ["phone"=>$abonent["phone"],
                                    "name"=>$abonent["name"],
                                    "owner"=>$abonent["owner"],
                                    "address"=>$abonent["address"],
                                    "info" => $abonent["info"],
                                    "is_visible"=>$abonent["is_visible"],
                                    "id" => $abonent["id"]
            ]);
        return $c;
    }

    public function remove(array $abonent) {
        $sql = "DELETE FROM phonebook WHERE id = :id";
        $c = $this->db->exec($sql, ["id"=>$abonent["id"]]);
        if($c == 1) {
            $abonent["data"] = date("Y-m-d H:s:i");
            $this->saveRemovedAbonent($abonent);
        }
        return $c;
    }

    private function saveRemovedAbonent(array $abonent) {
        unset($abonent["id"]);
        $sql = "INSERT INTO phonebook_removed (city, phone, name, owner, address, info, is_company, is_visible, data, user_id) 
                VALUES (:city, :phone, :name, :owner, :address, :info, :is_company, :is_visible, :data, :user_id);";
        return $this->db->exec($sql, $abonent);
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